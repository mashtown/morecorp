@extends('layouts.app')

@section('content')
	<div class="maxed-content">
		<h1 class="text-center">{{ $product->name }}</h1>
	    <div class="row">
	    	<div class="col-sm-5">
	    		<img src="//via.placeholder.com/350x350" alt="{{ $product['name'] }}" class="card-img-top">
	    	</div>
	    	<div class="col-sm-7">
	    		<div class="product--info">
	    			<p>{{ $product->description }}</p>
	    			<div class="price-sku">
	    				<strong>R{{ $product->price }}</strong> // SKU: {{ $product->sku }}
	    			</div>
	    			<div class="bidders">
	    				<h3>Biddings</h3>
	    				<div class="row">
	    					<div class="col-sm-4">Highest Bid</div>
	    					<div class="col-sm-6"><strong>R{{ $highest_bidder }}</strong></div>
	    				</div>
	    				<div class="row">
	    					<div class="col-sm-4">Lowest Bid</div>
	    					<div class="col-sm-6"><strong>R{{ $lowest_bidder }}</strong></div>
	    				</div>
	    				<div class="row">
	    					<div class="col-sm-4">Your Bid</div>
	    					<div class="col-sm-6"><strong>R1480.00</strong></div>
	    				</div>
	    			</div>
	    		</div>
	    		
	    	</div>
	    </div>
	</div>
@endsection