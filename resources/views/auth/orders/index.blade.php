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
                    <td>{{$order->calculateFullSum()}}$</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a class="btn btn-success" type="button"
                               @admin
                              {{-- @if(Auth::user()->isAdmin())--}}
                                 href="{{route('orders.show', $order)}}"
                               @else
                                href="{{route('person.orders.show', $order)}}"
                                    @endadmin

                            >Open</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$orders->links()}}
    </div>
@endsection