<?php

namespace App\Listeners;

use App\Events\SubscriptionEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Model\UserBook;
use App\Model\PaymentRequest;

class SubscriptionEventListener implements ShouldQueue
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
     * @param  Event  $event
     * @return void
     */
    public function handle(SubscriptionEvent $event)
    {
        $user=$event->_user;
        $paymentRequest=$event->_paymentRequest;
        $group=$paymentRequest->group;
        $group->load('startBook:year,month','endBook:year,month');
        $startBook=$group->startBook;
        $endBook=$group->endBook;
        $subject='Payment failed';
        $view='emails.failed_subscription';
        $data=array('title'=>$subject,
                'user'=>$user->firstname.' '.$user->lastname,
                'amount'=>number_format($paymentRequest->amount,2),
        );
        if ($paymentRequest->payment_status){
            $subject='Payment successful';
            $view='emails.subscription';        
            $data['startmonth']=$startBook->month;
            $data['startyear']=$startBook->year;
            $data['endmonth']=$endBook->month;
            $data['endyear']=$endBook->year;
        }

        Mail::send($view, $data, function ($message) use ($user,$subject){            
        
            $message->to($user->email, $user->firstname.' '.$user->lastname);
        
            $message->subject($subject);
        
            $message->priority(3);
        
        });

    }
}
