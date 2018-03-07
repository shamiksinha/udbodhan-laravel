<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class LogRegisteredUser implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $registeredEmail=$event->user->email;
        $username=$event->user->firstname.' '.$event->user->lastname;
        Log::info($registeredEmail.' has been registered.');
        Mail::send('emails.welcome_udbodhan', array('username'=>$username), function ($message) use ($registeredEmail,$username) {
        
            $message->to($registeredEmail, $username);

            $message->subject('Welcome to Udbodhan');
        
            $message->priority(3);
        });
        Log::info('Mail sent to '.$registeredEmail);
    }
}
