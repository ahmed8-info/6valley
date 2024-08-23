<?php

namespace App\Listeners;

use App\Events\CustomerStatusUpdateEvent;
use App\Mail\CustomerStatusUpdateMail;
use Illuminate\Support\Facades\Mail;

class CustomerStatusUpdateListener
{
    public function __construct()
    {
        //
    }

    public function handle(CustomerStatusUpdateEvent $event): void
    {
        $this->sendNotification($event);
    }

    public function sendNotification($event): void
    {
        $data = $event->data;
        try{
            Mail::to($data['email'])->send(new CustomerStatusUpdateMail($data));
        }catch(\Exception $exception) {
            info($exception);
        }
    }
}
