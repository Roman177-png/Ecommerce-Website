@extends('layouts.master')
@section('title', 'Item')
@section('content')
        <h1>iPhone X 64GB</h1>
        <h2>{{$product}}</h2>
        <h2>Mobile phone</h2>
        <p>Price: <b>71990 </b></p>
        <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg">
        <p>Nice phone </p>

        <form action="http://internet-shop.tmweb.ru/basket/add/1" method="POST">
            <button type="submit" class="btn btn-success" role="button">Add in basket</button>

            <input type="hidden" name="_token" value="UtGKi6VhaMwcTnpZ8SFw2FZAACZ7POHoQ5CGijvi">        </form>
@endsection