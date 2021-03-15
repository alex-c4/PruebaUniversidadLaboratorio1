<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendInvitation extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $xgname;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $xgname)
    {
        $this->data = $data;
        $this->xgname = $xgname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.sendInvitation')
                    ->from('xportgoldmail@xportgold.com', 'XportGold')
                    ->subject('Invitación a participar en XportGame - ' . $this->xgname)
                    ->with($this->data);
    }
}
