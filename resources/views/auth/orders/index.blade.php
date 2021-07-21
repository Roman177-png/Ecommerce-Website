@extends('auth.layouts.master')
@section('title', 'Orders')
@section('content')
    <div class="col-md-12">
        <h1>Orders</h1>
        <table class="table">
            <tbody>

            <tr>
                <th>
                    #
                </th>
                <th>
                    Name
                </th>
                <th>
                    Phone
                </th>
                <th>
                    When send
                </th>
                <th>
                    Sum
                </th>
                <th>
                    Action
                </th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->created_at->format('H:m:s d/m/y')}}</td>
                    <td>{{$order->getFullPrice()}}$</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a class="btn btn-success" type="button"
                               href="http://laravel-diplom-1.rdavydov.ru/admin/orders/1">Open</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection