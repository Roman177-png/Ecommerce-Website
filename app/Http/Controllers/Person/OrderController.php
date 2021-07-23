<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->/*where('status','1')*/active()->paginate(10);
        return view('auth.orders.index',compact('orders'));
    }
    public function show(Order $order)
    {
        /*        $order = Order::get();*/
        if(!Auth::user()->orders->contains($order)){
            return back();
        }
        return view('auth.orders.show',compact('order'));
    }
}
