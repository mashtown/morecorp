@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <h4>Products</h4>
            <ul class="list-unstyled">
                <li><a href="/dashboard/products/create">Add New Product</a></li>
                <li><a href="/dashboard/products">List Products</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Products</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <td>Lowest Bid</td>
                                <td>Average Bid</td>
                                <td>Highest Bid</td>
                                <td>Views</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->lowest_bid }}</td>
                                <td>{{ $product->average_bid }}</td>
                                <td>{{ $product->highest_bid }}</td>
                                <td>{{ $product->views }}</td>
                                <td>
                                    <a href="/dashboard/products/edit/{{ $product->id }}">edit</a> / 
                                    <a href="/dashboard/products/delete/{{ $product->id }}">delete</a> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection