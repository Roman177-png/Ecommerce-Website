<?php

namespace App\Http\Controllers;


use App\Classes\Basket;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{

    public function basket()
    {
        $order = (new Basket())->getOrder();

  //      $orderId = session('orderId');
        //if(!is_null($orderId))
        //{
/*        $order = Order::findOrFail($orderId);*/

        //}
        return view ('basket', compact('order'));
    }
    public function basketConfirm(Request $request )
    {
       // $orderId = session('orderId');
/*        if(is_null($orderId))
        {
            return redirect()->route('index');
        }*/
        //$order = Order::findOrFail($orderId);

       // $success = (new Basket())->saveOrder($request->name, $request->phone );

        if((new Basket())->saveOrder($request->name, $request->phone ))
        {
            session()->flash('success','Your order will be processed');
        }else{
            session()->flash('warning','Product are not available for order');
        }
        Order::eraseOrderSum();

        return redirect()->route('index');
    }
    public function basketPlace()
    {
        $basket = new Basket();
        //$orderId = session('orderId');
/*        if(is_null($orderId))
        {
            return redirect()->route('index');
        }*/
        //$order = Order::findOrFail($orderId);
        $order = $basket->getOrder();
        if(!$basket->countAvailable())
        {
            session()->flash('warning', ' Product are not available for order');
            return redirect()->route('basket');

        }

        return view ('order', compact('order'));
    }


    public function basketAdd(Product $product)
    {
        $result = (new Basket(true))->addProduct($product);
        /*$orderId = session('orderId');
        if(is_null($orderId))
        {
            $order = Order::create();
            session(['orderId' =>$order->id]);

        }
        else {

            $order = Order::findOrFail($orderId);*/
           // dd($productId);

        //}
        //if($order->products->contains($product->id))
        //{
            //dd($productId);
            //$pivotRow = $order->products()->where('product_id', $product->id/*$productId*/)->first()->pivot;
          //  $pivotRow = $order->products()->where('product_id', $product->id)->first()->pivot;
            //$pivotRow->count++;
            //$pivotRow->update();
        //}else{
          //  $order->products()->attach(/*$product->id*/$product->id);

        //}
/*        if(Auth::check())
        {

            $order->user_id = Auth::id();
            $order->save();
        }*/


        //$product = Product::find($product->id);
        if($result)
        {
            session()->flash('success', 'Added Product' . $product->name);
        }else{
            session()->flash('warning', ' Product' . $product->name . 'Large quantities are not available for order');
        }


       // Order::changeFullSum($product->price);

        return redirect()->route('basket');

        //return view ('basket', compact('order'));

    }

    public function basketRemove(Product $product)

    {
        (new Basket())->removeProduct($product);
        //$order = $basket->getOrder();
        //$orderId = session('orderId');
        //if(is_null($orderId)){
           // $orderId = Order::all()->first()->id;
            //$order = Order::findOrFail($orderId);
           // $order->products()->detach($productId);
           // return redirect()->route('basket');
        //}
        //$order = Order::findOrFail($orderId);


        //if($order->products->contains(/*$product->id*/$product->id))
        //{
            //$pivotRow = $order->products()->where('product_id', /*$product->id*/ $product->id)->first()->pivot;
            //if($pivotRow->count <2)
            //{/*
              //  $order->products()->detach($productId);*/

          //      $order->products()->detach($product->id/*$product->id*/);
        //    }else{
      //          $pivotRow->count--;
    //            $pivotRow->update();
  //          }

//        }

       // $product = Product::find($productId);
        Order::changeFullSum(-$product->price);

        session()->flash('warning', 'Delete item' . $product->name);

        return redirect()->route('basket');

    }


}
