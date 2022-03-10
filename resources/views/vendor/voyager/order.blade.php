@extends('voyager::master')
@section('content')
    <h1 class="page-title">
        <i class="voyager-shop"></i>
        Create new order
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
                @csrf
                <div class="panel-body">
                    <form method="POST" action="{{route('order-submit')}}">
                    @csrf
                    <div class="col-lg-12">
                        <h2>Available products</h2>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Warehouse</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Price</th>
                                <th>Delivery date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->product->name }}</td>
                                    <td>{{ $product->warehouse->name}}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>
                                        <div class="form-group  col-md-5">
                                            <label for="quantity">Quantity</label>
                                            <input type="number" class="form-control" id="quantity" name="quantity[]" min="0" max="{{ $product->quantity }}" required>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="panel-footer">
                        <button type="submit" name="submit_mailer" class="btn btn-primary save">Complete purchase</button>
                    </div>
                    </div>
                </form>
        </div>
    </div>
</div>
@stop
