@extends('auth.layouts.master')

@section('title', 'Order ' . $order->id)

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="justify-content-center">
                <div class="panel">
                    <h1>Order №{{ $order->id }}</h1>
                    <p> name: <b>{{ $order->name }}</b></p>
                    <p>Phone: <b>{{ $order->phone }}</b></p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Count</th>
                            <th>Price</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach (/*$order->products*/ $products as $product)
                            <tr>
                                <td>
                                    <a href="{{ route('product', [$product->category->code, $product->code]) }}">
                                        <img height="56px"
                                             src="{{ Storage::url($product->image) }}">
                                        {{ $product->name }}
                                    </a>
                                </td>
                                <td><span class="badge">1 </span></td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->getPriceForCount() }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">All sum:</td>
                            <td>{{ $order->calculateFullSum() }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection