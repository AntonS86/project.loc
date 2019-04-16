<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClientSendMail extends Mailable
{
    use Queueable, SerializesModels;


    public $view    = 'email.clientSendMail';
    public $subject = 'Клиентское письмо с index';
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->data['companyEmail'],
            $this->data['name'])->subject($this->subject)->view($this->view);
    }
}
