@extends('layouts.master')
@section('title', 'Item')
@section('content')
        <h1>{{$product->name}}</h1>
        <h2>{{$product->category->name}}</h2>
        <p>{{$product->price}} <b> </b></p>
        <img src="{{Storage::url($product->image)}}">
        <p>{{$product->description}}</p>
        @if($product->isAvailable())
                <a class="btn btn-success"href="{{route('basket-add', $product)}}">In Basket</a>
{{--                <button type="submit"  class="btn btn-primary" role="button">In Basket</button>--}}
        {{--{{$product->category->name}}--}}
        @else
                No available
        @endif
@endsection