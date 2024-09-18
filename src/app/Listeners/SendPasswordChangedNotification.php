<?php

namespace App\Listeners;

use App\Events\PasswordChanged;
use App\Mail\PasswordChangedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPasswordChangedNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PasswordChanged $event): void
    {
        Mail::to($event->user->email)->send(
            new PasswordChangedMail(
                from_address: _ttrs('from_address'),
                from_name: _ttrs('from_name'),
                the_name: $event->user->profile->firstname.' '.$event->user->profile->lastname,
                the_subject: 'Your password has been changed',
                the_new_password: $event->new_password,
            )
        );
    }
}
