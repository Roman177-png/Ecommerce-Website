<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 26.07.21
 * Time: 23:44
 */

namespace App\Classes;


use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class Basket
{
    protected $order;

    public function __construct($createOrder = false)
    {
        $orderId = session('orderId');

        if(is_null($orderId) && $createOrder)
        {
            $data = [];
            if(Auth::check()){
            $data['user_id'] = Auth::id();



            $this->order = Order::create([$data]);
            session(['orderId' =>$this->order->id]);

            }
        }
        else {

            $this->order = Order::findOrFail($orderId);
        }



    }

    public function getOrder()
    {
        return $this->order;
    }
    public function countAvailable()
    {
        foreach($this->order->products as $orderProduct)
        {
            if($orderProduct->count < $this->getPivotRow($orderProduct)->count)
            {
                return false;
            }
        }
        return true;
    }
    public function saveOrder($name, $phone)
    {
        if(!$this->countAvailable())
        {
            return false;
        }
        return $this->order->saveOrder($name, $phone);
    }

    protected function getPivotRow($product)
    {
        return $this->order->products()->where('product_id', /*$product->id*/ $product->id)->first()->pivot;
    }

    public function removeProduct(Product $product)
    {
        if($this->order->products->contains(/*$product->id*/$product->id))
        {
            $pivotRow = $this->getPivotRow($product);
            if($pivotRow->count <2)
            {/*
                $order->products()->detach($productId);*/

                $this->order->products()->detach($product->id/*$product->id*/);
            }else{
                $pivotRow->count--;
                $pivotRow->update();
            }

        }
    }
    public function addProduct(Product $product)
    {

        if($this->order->products->contains($product->id))
        {

            //dd($productId);
            //$pivotRow = $order->products()->where('product_id', $product->id/*$productId*/)->first()->pivot;
            $pivotRow = $this->getPivotRow($product);
            $pivotRow->count++;
            if($pivotRow->count > $product ->count)
            {
                return false;
            }
            $pivotRow->update();

        }else{
            if($product->count == 0)
            {
                return false;
            }
            $this->order->products()->attach(/*$product->id*/$product->id);

        }
/*        if(Auth::check())
        {

            $this->order->user_id = Auth::id();
            $this->order->save();
        }*/

        Order::changeFullSum($product->price);

        return true;
    }

}