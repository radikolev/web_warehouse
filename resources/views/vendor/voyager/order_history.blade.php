@extends('voyager::master')
@section('content')
    <h1 class="page-title">
        <i class="voyager-shop"></i>
        Orders History
    </h1>

@if(session()->has('success'))
    <div class="col-md-12">
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    </div>
@endif

@if(session()->has('error'))
    <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
            {{ session()->get('error') }}
        </div>
    </div>
@endif

    <div class="page-content edit-add container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <div class="col-lg-12">
                        <h2>Orders History</h2>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Total Price</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->total_price }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td><a href="{{ route('order-info-byID', $order->id) }}" class="btn btn-primary" title="Click for more information">Details</a></td>
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
