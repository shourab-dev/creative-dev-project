<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LeedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $fileName;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->view('Email.LeedMail')->subject("Tomorrow's Seminar's Leeds");
        foreach ($this->fileName as $file) {

            $mail->attach($file);
        }
        return $mail;
    }
}
