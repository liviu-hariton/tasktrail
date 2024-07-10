<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Mail\EmailConfirmLink;
use App\Mail\PasswordReset;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'name',
        'email',
        'password',
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
        return $this->hasOne(User::class);
    }

    public function sendPasswordResetNotification($token): void
    {
        Mail::to($this->email)->send(
            new PasswordReset(
                from_address: _ttrs('from_address'),
                from_name: _ttrs('from_name'),
                the_name: $this->name,
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
                the_name: $this->name,
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
}
