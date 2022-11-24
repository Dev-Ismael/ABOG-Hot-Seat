<?php

namespace App\Mail\Order\Update;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderUserMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.order.update.user')                               // Mail blade
        ->Subject($this->mailData['title'])                                 // Subject mail
        ->from( "info@ahsboardprep.com" , "ABOG Hot-Seat" )     // From 2 prame ( mail sender , name sender )
        ->with('mailData' , $this->mailData);
    }
}
