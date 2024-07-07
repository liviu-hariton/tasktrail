<?php

namespace App\Models;

use App\Traits\ModelCache;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    // Disable timestamps
    public $timestamps = false;

    protected $fillable = [
        'group', 'key', 'value', 'comments'
    ];

    protected array $groups = [
        'mailing', 'contact', 'social', 'fiscal', 'other'
    ];

    protected array $mailers = [
        'smtp' => 'SMTP',
        'sendmail' => 'Sendmail / PHP mail()',
        'mailgun' => 'Mailgun',
        'postmark' => 'Postmark',
        'ses' => 'Amazon SES',
        'mailersend' => 'MailerSend',
    ];

    /**
     * @todo Merge this array with the $mailers array in a multidimensional array
     */
    protected array $mailers_composer_packages = [
        'mailgun' => 'symfony/mailgun-mailer',
        'postmark' => 'symfony/postmark-mailer',
        'ses' => 'aws/aws-sdk-php',
        'mailersend' => 'mailersend/laravel-driver',
    ];

    protected array $smtpEncryptionMethods = [
        'tls' => 'TLS',
    ];

    /**
     * @todo Move this data to the database
     */
    protected array $socialNetworks = [
        [
            'field' => 'facebook',
            'label' => 'Facebook&trade; page or profile',
            'icon' => 'bi bi-facebook',
        ],
        [
            'field' => 'instagram',
            'label' => 'Instagram&trade; profile',
            'icon' => 'bi bi-instagram',
        ],
        [
            'field' => 'threads',
            'label' => 'Threads&trade; profile',
            'icon' => 'bi bi-threads',
        ],
        [
            'field' => 'tiktok',
            'label' => 'TikTok&trade; profile',
            'icon' => 'bi bi-tiktok',
        ],
        [
            'field' => 'linkedin',
            'label' => 'Linkedin&trade; page or profile',
            'icon' => 'bi bi-linkedin',
        ],
        [
            'field' => 'twitterx',
            'label' => 'X&trade; (Twitter&trade;) account',
            'icon' => 'bi bi-twitter-x',
        ],
        [
            'field' => 'pinterest',
            'label' => 'Pinterest&trade; profile',
            'icon' => 'bi bi-pinterest',
        ],
        [
            'field' => 'vimeo',
            'label' => 'Vimeo&trade; profile',
            'icon' => 'bi bi-vimeo',
        ],
        [
            'field' => 'youtube',
            'label' => 'Youtube&trade; channel or profile',
            'icon' => 'bi bi-youtube',
        ],
        [
            'field' => 'reddit',
            'label' => 'Reddit&trade; profile',
            'icon' => 'bi bi-reddit',
        ],
        [
            'field' => 'spotify',
            'label' => 'Spotify&trade; profile',
            'icon' => 'bi bi-spotify',
        ],
    ];

    public function groups(): array
    {
        return $this->groups;
    }

    public function mailers(): array
    {
        return $this->mailers;
    }

    public function smtpEncryptionMethods(): array
    {
        return $this->smtpEncryptionMethods;
    }

    public function mailersComposerPackages(): array
    {
        return $this->mailers_composer_packages;
    }

    public function socialNetworks(): array
    {
        return $this->socialNetworks;
    }

    /**
     * If the group is 'mailing', then we will reset only the current mailer settings
     *
     * @param Builder $query
     * @param string $group
     * @return Builder
     */
    public function scopeIsMailer(Builder $query, string $group): Builder
    {
        if($group === 'mailing') {
            return $query->where('key', 'like', _ttrs('mailer_type').'_%');
        }

        return $query;
    }
}
