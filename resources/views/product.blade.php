@extends('layouts.master')
@section('title', 'Item')
@section('content')
        <h1>{{$product->name}}</h1>
        <h2>{{$product->category->name}}</h2>
        <p>{{$product->price}} <b> </b></p>
        <img src="{{Storage::url($product->image)}}">
        <p>{{$product->description}}</p>
        @if($product->isAvailable())
                <form action="{{route('basket-add', $product)}}" method="POST">
                        <button type="submit"  class="btn btn-success" role="button">In Basket</button>
                        {{--{{$product->category->name}}--}}
                        @csrf
                </form>
                @else
                        <span>No available</span>
                        <br>
                <span>Notify me when the item is back in stock</span>
                <div class="warning">
                        @if($errors->get('email'))
                                {!! $errors->get('email')[0] !!}
                        @endif
                </div>
                        <form method="POST" action="{{route('subscription', $product)}}">

                        @csrf
                        <input type="text" name="email"> </input>
                        <button type="submit">Send</button>
                </form>
                @endif
       {{--         <a href="{{ route('product', [isset($category) ? $category->code : $product->category->code, $product->code]) }}" class="btn btn-default"
                   role="button">Details</a>
       --}}         {{--                    <a href="{{route('product',[isset($category) ? $category->code:$product->category->code, $product->code])}}"
                                       class="btn btn-default"
                                       role="button">Details</a>--}}

        {{--@if($product->isAvailable())--}}
               {{-- <a class="btn btn-success"href="{{route('basket-add', $product)}}">In Basket</a>--}}
{{--                <button type="submit"  class="btn btn-primary" role="button">In Basket</button>--}}
        {{--{{$product->category->name}}--}}
        {{--@else
                No available
        @endif--}}
@endsection