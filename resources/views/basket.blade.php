@extends('layouts.master')
@section('title', 'Baskets')
@section('content')
            <h1>Basktet</h1>
            <p>Make order</p>
            <div class="panel">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Count</th>
                        <th>Price</th>
                        <th>Prices</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->products()->with('category')->get() as $product)
                        <tr>
                            <td>

                                <a href="{{route(('product'),[$product->category->code, $product->code])}}">
                                    <img height="56px" src="{{Storage::url($product ->image)}}">
                                    {{ $product->name }}
                                </a>
                            </td>
                            <td><span class="badge">{{$product->pivot->count}}</span>
                                <div class="btn-group form-inline" >
                                    <form action="{{route('basket-remove', $product)}} " method="POST">
                                        <button type="submit" class="btn btn-danger" href= "" ><span
                                                    class="glyphicon glyphicon-minus" aria-hiden="true"></span></button>
                                        @csrf
                                    </form>
                                    <form action="{{route('basket-add', $product)}} " method="POST">
                                        <button type="submit" class="btn btn-success" href= "" ><span
                                                    class="glyphicon glyphicon-plus" aria-hiden="true"></span></button>
                                        @csrf
                                    </form>
                                </div>
                            </td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->getPriceForCount()}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3">All sum:</td>
                        <td>{{$order->getFullSum()}} ???</td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <div class="btn-group pull-right" role="group">
                    <a type="button" class="btn btn-success" href="{{route('basket-confirm')}}">Make order</a>
                </div>
@endsection
