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
                <div class="card-header">Edit Product: {{ $product->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="/dashboard/products/update">
                        {!! csrf_field() !!}
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                        </div>
                        <div class="form-group">
                            <label for="sku">Sku</label>
                            <input type="text" class="form-control" id="sku" name="sku" value="{{ $product->sku }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price (ZAR)</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" rows="3" id="description" name="description">{{ $product->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection