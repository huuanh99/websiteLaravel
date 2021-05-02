<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
include_once('app/Format/format.php');
use Format;
class OrderNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public $fm;
    public function __construct($data)
    {
        $this->data = $data;
        $this->fm = new Format();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data=$this->data;
        $fm=$this->fm;
        return $this->view('emails.OrderNotification',compact('fm','data'))
            ->subject('Your order information');
    }
}
