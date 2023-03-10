<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use function Faker\Provider\pt_BR\check_digit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::/*where('status','1')*/active()->paginate(10);
        return view('auth.orders.index',compact('orders'));
    }
    public function show(Order $order)
    {
        /*$order->load('products');*/
        $products = $order->products()->withTrashed()->get();

/*        $order = Order::get();*/
        return view('auth.orders.show',compact('order','products'));
    }
}
