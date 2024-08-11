<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordChangedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public string $from_address,
        public string $from_name,
        public string $the_name,
        public string $the_subject,
        public string $the_new_password,
    )
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->from_address, $this->from_name),
            // user should reply to the site's email address
            replyTo: [new Address(_ttrs('from_address'), _ttrs('from_name'))],
            subject: $this->the_subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.user.password-changed',
            with:[
                'the_subject' => $this->the_subject,
                'the_name' => $this->the_name,
                'the_new_password' => $this->the_new_password,
                'the_logo' => public_path('assets/images/logo.png'),
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
