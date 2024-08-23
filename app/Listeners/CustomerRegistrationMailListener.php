<?php

namespace App\Listeners;

use App\Events\CustomerRegistrationMailEvent;
use App\Mail\CustomerRegistrationMail;
use Illuminate\Support\Facades\Mail;

class CustomerRegistrationMailListener
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
    public function handle(CustomerRegistrationMailEvent $event): void
    {
        $this->sendMail($event);
    }

    private function sendMail(CustomerRegistrationMailEvent $event):void{
        $email = $event->email;
        $data = $event->data;
        try{
            Mail::to($email)->send(new CustomerRegistrationMail($data));
        }catch(\Exception $exception) {
            info($exception);
        }
    }
}
