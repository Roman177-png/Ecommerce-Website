<?php

namespace App\Mail;

use App\Classes\Basket;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $name;
    protected $order;
    public function __construct($name, Order $order)
    {
        $this->name = $name;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fullSum =  $this->order->calculateFullSum() ;
        return $this->view('mail.order_created',[
            'name' => $this->name,
            'fullSum' =>$fullSum ,
            'order' =>  $this->order
        ]);
    }
}
