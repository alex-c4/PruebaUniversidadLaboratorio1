<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentConfirm extends Mailable
{
    use Queueable, SerializesModels;

    public $payment;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($payment, $user)
    {
        //
        $this->payment = $payment;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.payment');
    }
}
