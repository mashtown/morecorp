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
                                <a role="button" data-toggle="collapse" href="#collapse{{ $product['id'] }}" aria-expanded="false" aria-controls="collapse{{ $product['id'] }}">bid now</a>
                            </div>
                            <div class="col-xs-6 text-right">
                                <span class="product--price">R{{ sprintf('%0.2f', $product['price']) }}</span>
                            </div>
                        </div>
                        <form method="post" action="/post-bidding" class="collapse bidding--form" id="collapse{{ $product['id'] }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                            <div class="form-group">
                                <label for="name" class="sr-only">Email Address</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email Address">
                            </div>
                            <div class="input-group">
                                <label for="price" class="sr-only">Price</label>
                                <span class="input-group-addon">R</span>
                                @php $bid = ($product['price'] + ( $product['price'] * 0.15)); @endphp
                                <input type="text" class="form-control" id="price" name="price" placeholder="00.00" value="{{ sprintf('%0.2f', $bid) }}">
                            </div>
                            <div class="form-group m-t-15">
                                <button class="btn btn-primary btn-block" type="submit">Bid Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
@endsection