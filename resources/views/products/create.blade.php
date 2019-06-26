@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">Creat a new Product</div>
    @php // dd(Auth::user()) @endphp

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="post" action="/dashboard/products/create" class="row">
            {!! csrf_field() !!}
            <input type="hidden" name="user_id" value="{{ \Auth::user()->id }}">
            <div class="form-group col-xs-12">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group col-sm-6">
                <label for="sku">Sku</label>
                <input type="text" class="form-control" id="sku" name="sku">
            </div>
            <div class="form-group col-sm-6">
                <label for="price">Price (ZAR)</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>
            <div class="form-group col-xs-12">
                <label for="description">Description</label>
                <textarea class="form-control" rows="3" id="description" name="description"></textarea>
            </div>
            <div class="col-xs-12">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection