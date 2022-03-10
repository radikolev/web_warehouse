@extends('voyager::master')
@section('content')
    <h1 class="page-title">
        <i class="voyager-shop"></i>
        Order #{{ Request::segment(3) }}
    </h1>

@if(session()->has('success'))
    <div class="col-md-12">
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    </div>
@endif

    <div class="page-content edit-add container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <div class="col-lg-12">
                        <h2>Order #{{ Request::segment(3) }}</h2>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->product->name }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>
@stop
