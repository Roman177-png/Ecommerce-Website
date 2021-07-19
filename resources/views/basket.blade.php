@extends('master')
@section('title', 'Baskets')
@section('content')
    <div class="container">
        <div class="starter-template">
            <p class="alert alert-success">Добавлен товар HTC One S</p>
            <h1>Корзина</h1>
            <p>Оформление заказа</p>
            <div class="panel">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Название</th>
                        <th>Кол-во</th>
                        <th>Цена</th>
                        <th>Стоимость</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->products as $product)
                        <tr>
                            <td>
                                <a href="{{route('product'),[$product->category->code, $product->code]}}">
                                    <img height="56px" src="http://internet-shop.tmweb.ru/storage/products/htc_one_s.png">
                                    {{ $product->name }}
                                </a>
                            </td>
                            <td><span class="badge">1</span>
                                <form class="btn-group">
                                    <a type="button" class="btn btn-danger" href="http://internet-shop.tmweb.ru/basket/remove/3"><span
                                        class="glyphicon glyphicon-minus" aria-hiden="true"></span></a>
                                    <form action="{{route('basket-add', $product)}} " method="POST">
                                        <button type="submit" class="btn btn-success" href= "" ><span
                                                    class="glyphicon glyphicon-plus" aria-hiden="true"></span></button>
                                        @csrf
                                    </form>
                                </div>
                            </td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->price }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3">Общая стоимость:</td>
                        <td>12490 ₽</td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <div class="btn-group pull-right" role="group">
                    <a type="button" class="btn btn-success" href="http://internet-shop.tmweb.ru/basket/place">Оформить заказ</a>
                </div>
            </div>
        </div>
@endsection
