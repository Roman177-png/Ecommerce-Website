<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{

    public function basket()
    {

        $orderId = session('orderId');
        if(!is_null($orderId))
        {
            $order = Order::findOrFail($orderId);

        }
        return view ('basket', compact('order'));
    }
    public function basketConfirm(Request $request )
    {
        $orderId = session('orderId');
        if(is_null($orderId))
        {
            return redirect()->route('index');
        }
        $order = Order::findOrFail($orderId);
        $success = $order->saveOrder($request->name, $request->phone );

        if($success)
        {
            session()->flash('success','Your order will be ...');
        }else{
            session()->flash('warning','Error');
        }


        return redirect()->route('index');
    }
    public function basketPlace()
    {
        $orderId = session('orderId');
        if(is_null($orderId))
        {
            return redirect()->route('index');
        }
        $order = Order::findOrFail($orderId);
        return view ('order', compact('order'));
    }


    public function basketAdd($productId)
    {

        $orderId = session('orderId');
        if(is_null($orderId))
        {
            $order = Order::create();
            session(['orderId' =>$order->id]);

        }
        else {

            $order = Order::findOrFail($orderId);
           // dd($productId);

        }
        if($order->products->contains($productId))
        {
            //dd($productId);
            //$pivotRow = $order->products()->where('product_id', $product->id/*$productId*/)->first()->pivot;
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        }else{
            $order->products()->attach(/*$product->id*/$productId);

        }
        if(Auth::check())
        {

            $order->user_id = Auth::id();
            $order->save();
        }


        $product = Product::find($productId);
        session()->flash('success', 'Add item' . $product->name);

        return redirect()->route('basket');

        //return view ('basket', compact('order'));

    }

    public function basketRemove($productId)

    {
        $orderId = session('orderId');
        if(is_null($orderId)){
            $orderId = Order::all()->first()->id;
            $order = Order::findOrFail($orderId);
            $order->products()->detach($productId);
            return redirect()->route('basket');
        }
        $order = Order::findOrFail($orderId);

        dump($order->products->contains($productId));

        if($order->products->contains(/*$product->id*/$productId))
        {
            $pivotRow = $order->products()->where('product_id', /*$product->id*/ $productId)->first()->pivot;
            if($pivotRow->count <2)
            {/*
                $order->products()->detach($productId);*/

                $order->products()->detach($productId/*$product->id*/);
            }else{
                $pivotRow->count--;
                $pivotRow->update();
            }

        }

        $product = Product::find($productId);
        session()->flash('warning', 'Delete item' . $product->name);

        return redirect()->route('basket');

    }


}
