<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProductsFilterRequest;

use App\Http\Requests\SubscriptionRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use \Debugbar;
use Monolog\Handler\AmqpHandler;

class MainController extends Controller
{
    public function index(ProductsFilterRequest $request)
    {
      //  \Debugbar::info('my_info');
        /*Log::channel('single')->info($request->ip());*/
        $productsQuery = Product::with('category')->orderBy('name')/*query()*/;
        if($request->filled('price_from'))
        {

            $productsQuery->where('price','>=',$request->price_from);
        }
        if($request->filled('price'))
        {
            $productsQuery->where('price_from','<=',$request->price_to);
        }
        foreach (['hit','new','recommend'] as $field)
        {
            if($request->has($field))
            {
                /*$productsQuery->hit();*/
                $productsQuery->/*where($field,1)*/$field();
            }
        }


        $products =$productsQuery->paginate(6)->withPath("?". $request->getQueryString());
        return view('index',compact('products'));

    }
    public function categories()
    {
        $categories = Category::get();
        return view('categories',compact('categories'));
    }
    public function category($code)
    {

        $category = Category::where('code', $code)->first();
        //$products = Product::where('category_id', $category->id)->get();
       // return view('category', compact('category','products'));
        return view('category', compact('category'));

    }
    public function product($category, $productCode)
    {
        $product = Product::withTrashed()->byCode($productCode)->firstOrFail();
        return view('product', compact('product') /*['product' => $product]*/);
    }
    public function subscribe(SubscriptionRequest $request, Product $product)
    {
        Subscription::create([
            'email' => $request->email,
            'product_id' => $product->id,
        ]);
        return redirect()->back()->with('success', 'Thank you, we will inform you if there is a product ');
    }
}
