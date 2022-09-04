<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\ActionCreated;
use App\Mail\ActionEmail;
use Mail;
class SendActionEmail
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
     * @param  object  $event
     * @return void
     */
    public function handle(ActionCreated $event)
    {
        $actionEmployee = $event->actionEmployee;
        $recipients = [
            'rrhhkmmotos@gmail.com',
            'garridoosman@gmail.com',
            'ealexander.zm@gmail.com',
	    'rrhncapacitacioneskmmotos@gmail.com',
            'rosicardenas54@gmail.com',
            'jefedeventaskmmotos@gmail.com',
            'contadorkmmotos@gmail.com',
        ];
        
        Mail::to($recipients)->send(new ActionEmail($actionEmployee));
    }
}
