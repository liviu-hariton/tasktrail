<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class MailConfigurationProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->setMailerConfig();
    }

    private function setMailerConfig(): void
    {
        $email_config = (object) config('_ttrs');

        if(isset($email_config->mailer_type)) {
            Config::set('mail.mailer', $email_config->mailer_type);

            Config::set('mail.from.address', $email_config->from_address);
            Config::set('mail.from.name', $email_config->from_name);

            match ($email_config->mailer_type) {
                'mailgun' => $this->setMailgun($email_config),
                'ses' => $this->setSES($email_config),
                'postmark' => $this->setPostmark($email_config),
                'sendmail' => $this->setSendmail($email_config),
                default => $this->setSMTP($email_config),
            };
        }
    }

    private function setSMTP(object $email_config): void
    {
        Config::set('mail.default', 'smtp');

        Config::set('mail.mailers.smtp.transport', 'smtp');

        Config::set('mail.mailers.smtp.host', $email_config->smtp_host);
        Config::set('mail.mailers.smtp.port', $email_config->smtp_port);
        Config::set('mail.mailers.smtp.username', $email_config->smtp_username);
        Config::set('mail.mailers.smtp.password', $email_config->smtp_password);

        if($email_config->smtp_encryption){
            Config::set('mail.mailers.smtp.encryption', $email_config->smtp_encryption);
        }

        if($email_config->smtp_local_domain){
            Config::set('mail.mailers.smtp.local_domain', $email_config->smtp_local_domain);
        }

        if($email_config->smtp_url){
            Config::set('mail.mailers.smtp.url', $email_config->smtp_url);
        }
    }

    private function setMailgun(object $email_config): void
    {
        Config::set('mail.default', 'mailgun');

        Config::set('mail.mailers.mailgun.transport', 'mailgun');

        Config::set('mail.mailers.mailgun.domain', $email_config->mailgun_domain);
        Config::set('mail.mailers.mailgun.secret', $email_config->mailgun_secret);

        if($email_config->mailgun_endpoint){
            Config::set('mail.mailers.mailgun.endpoint', $email_config->mailgun_endpoint);
        }
    }

    private function setSES(object $email_config): void
    {
        Config::set('mail.default', 'ses');

        Config::set('mail.mailers.ses.transport', 'ses');

        Config::set('mail.mailers.ses.key', $email_config->ses_key);
        Config::set('mail.mailers.ses.secret', $email_config->ses_secret);
        Config::set('mail.mailers.ses.region', $email_config->ses_region);
    }

    private function setPostmark(object $email_config): void
    {
        Config::set('mail.default', 'postmark');

        Config::set('mail.mailers.postmark.transport', 'postmark');

        Config::set('mail.mailers.postmark.token', $email_config->postmark_token);

        if($email_config->postmark_message_stream_id){
            Config::set('mail.mailers.postmark.message_stream_id', $email_config->postmark_message_stream_id);
        }
    }

    private function setSendmail(object $email_config): void
    {
        Config::set('mail.default', 'sendmail');

        Config::set('mail.mailers.sendmail.transport', 'sendmail');

        Config::set('mail.mailers.sendmail.path', $email_config->sendmail_path);
    }
}
