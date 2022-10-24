<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($requestData)
    {
        $this->requestData = $requestData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact')                               // Mail blade
        ->Subject($this->requestData['title'])                                 // Subject mail
        ->from( $this->requestData['email'] , $this->requestData['name'] )     // From 2 prame ( mail sender , name sender )
        ->with('requestData' , $this->requestData);                            // Send Data to mail blade
    }
}
