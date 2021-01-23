<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplayVendor extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $message;
    protected $replay;

    public function __construct($message , $replay)
    {
        $this->message = $message;
        $this->replay = $replay;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $contactMessage =  $this->message;

//        dd($contactMessage);
        $replay =  $this->replay;
        return $this->to($contactMessage->email)
            ->view('emails.sent' , compact('contactMessage' ,'replay'));
//            ->view(admin_vendors_vw() . '.replayMessages' , compact('contactMessage' ,'replay'));
    }
}
