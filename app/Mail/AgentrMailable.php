<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AgentrMailable extends Mailable
{
    use Queueable, SerializesModels;
    public  $agentr_data ;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($agentr_data)
    {
        //
    $this->agentr_data = $agentr_data ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');

        $from_name  =  "DiamwelyResto" ;
        $from_email  =  "mounasrydia73@gmail.com" ;
        $subject = "DiamwelyResto Merci d'avoir créer un compte";
        return $this->from($from_email, $from_name)
            ->view('emails.agentr')
            ->subject($subject)
        ;
    }
}
