@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1>Welcome to Laravel</h1>
        <p>Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
        <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p> -->
    </div>
    @if(!empty($products))
    <div class="products-wrap">
        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-4">
                <div class="product">
                    <img src="//via.placeholder.com/350x230" alt="{{ $product['name'] }}" class="card-img-top">
                    <div class="card-body">
                        <h3>{{ $product['name'] }}</h3>
                        <p class="card-text">{{ substr($product['description'], 0, 90) }}...</p>
                        <div class="row buttons">
                            <div class="col-xs-6">
                                <a href="/product/{{ $product['id'] }}/{{ str_slug($product['name']) }}" class="">view</a>
                                <a href="#" class="">bid</a>
                            </div>
                            <div class="col-xs-6 text-right">
                                <span class="product--price">R{{ $product['price'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
@endsection