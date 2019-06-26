@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome {{ Auth::user()->name }}
                    <br><br>
                    <a href="/dashboard/products"><i data-feather="list"></i> view products</a> / 
                    <a href="/dashboard/products/create"><i data-feather="plus"></i> Add new product</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
