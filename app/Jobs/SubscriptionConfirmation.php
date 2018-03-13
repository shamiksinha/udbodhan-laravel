<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SubscriptionConfirmation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
	protected $subscriptionMail;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(SubscriptionConfirmationMail $subscriptionMail)
    {
        this->$subscriptionMail=$subscriptionMail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send(this->$subscriptionMail);
    }
}
