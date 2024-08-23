<?php

namespace App\Listeners;

use App\Events\DigitalProductDownloadMailEvent;
use App\Mail\DigitalProductDownloadMail;
use Illuminate\Support\Facades\Mail;

class DigitalProductDownloadMailListener
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
    public function handle(DigitalProductDownloadMailEvent $event): void
    {
        $this->sendMail($event);
    }

    private function sendMail(DigitalProductDownloadMailEvent $event):void{
        $email = $event->email;
        $data = $event->data;
        try{
            Mail::to($email)->send(new DigitalProductDownloadMail($data));
        }catch(\Exception $exception) {
            info($exception);
        }
    }
}
