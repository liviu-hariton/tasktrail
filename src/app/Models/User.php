<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Mail\EmailConfirmLink;
use App\Mail\PasswordReset;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'role_id',
        'email',
        'password',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'data' => 'array',
        ];
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function sendPasswordResetNotification($token): void
    {
        Mail::to($this->email)->send(
            new PasswordReset(
                from_address: _ttrs('from_address'),
                from_name: _ttrs('from_name'),
                the_name: $this->username,
                the_subject: 'Your password reset link request',
                the_reset_url: route('password.reset', [
                    'token' => $token,
                    'email' => $this->email
                ]),
            )
        );
    }

    public function sendEmailVerificationNotification(): void
    {
        Mail::to($this->email)->send(
            new EmailConfirmLink(
                from_address: _ttrs('from_address'),
                from_name: _ttrs('from_name'),
                the_name: $this->username,
                the_subject: 'Verify your email for a seamless experience!',
                the_confirm_url: URL::temporarySignedRoute(
                    'verification.verify',
                    now()->addMinutes(config('auth.verification.expire', 60)),
                    [
                        'id' => $this->id,
                        'hash' => sha1($this->email),
                    ]
                ),
            )
        );
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($roles): bool
    {
        if($this->isGod()) {
            return true;
        }

        if(is_array($roles)) {
            return $this->roles()->whereIn('name', $roles)->exists();
        }

        return $this->roles()->where('name', $roles)->exists();
    }

    public function hasPermission($permission): bool
    {
        if($this->isGod()) {
            return true;
        }

        return $this->roles()->whereHas('permissions', function($query) use ($permission) {
            $query->where('name', $permission);
        })->exists();
    }

    public function hasAnyPermission(array $permissions): bool
    {
        if($this->isGod()) {
            return true;
        }

        return $this->roles()->whereHas('permissions', function($query) use ($permissions) {
            $query->whereIn('name', $permissions);
        })->exists();
    }

    public function isGod(): bool
    {
        return $this->roles()->where('name', 'GOD')->exists();
    }
}
