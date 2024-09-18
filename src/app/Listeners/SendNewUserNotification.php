<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\NewUserNotification;
use App\Mail\PasswordChangedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewUserNotification
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
    public function handle(UserRegistered $event): void
    {
        Mail::to($event->user->email)->send(
            new NewUserNotification(
                from_address: _ttrs('from_address'),
                from_name: _ttrs('from_name'),
                the_name: $event->user->profile->firstname.' '.$event->user->profile->lastname,
                the_subject: 'Your new account at '.config('app.name').' is ready',
                the_username: $event->user->username,
                the_password: $event->password,
            )
        );
    }
}
