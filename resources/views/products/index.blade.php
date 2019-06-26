@extends('layouts.admin')

@section('content')
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
                    <td>{{ round($product->lowest_bid,2) }}</td>
                    <td>{{ round($product->average_bid,2) }}</td>
                    <td>{{ round($product->highest_bid,2) }}</td>
                    <td>{{ $product->views }}</td>
                    <td>
                        <a href="/dashboard/products/edit/{{ $product->id }}"><i data-feather="edit"></i></a> 
                        <a href="/dashboard/products/delete/{{ $product->id }}"><i data-feather="trash-2"></i></a> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="m-t-30 text-right">
            <a href="/dashboard/products/create" class="btn btn-primary">Add new product</a>
        </div>
    </div>
</div>
@endsection