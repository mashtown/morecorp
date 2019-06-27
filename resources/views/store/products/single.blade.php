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
	    					<div class="col-sm-4">Highest Bid:</div>
	    					<div class="col-sm-6"><strong>R{{ sprintf('%0.2f', $highest_bidder) }}</strong></div>
	    				</div>
	    				<div class="row">
	    					<div class="col-sm-4">Lowest Bid:</div>
	    					<div class="col-sm-6"><strong>R{{ sprintf('%0.2f', $lowest_bidder) }}</strong></div>
	    				</div>
	    				@if($your_bidding != 0)
		    				<div class="row">
		    					<div class="col-sm-4">
		    						<div class="p-tb-5">
		    							<strong>Your Bidding:</strong>
		    						</div>
		    					</div>
		    					<div class="col-sm-6">
		    						<div class="highlight_your_bidding">
		    							<strong>R{{ sprintf('%0.2f', $your_bidding) }}</strong>
		    						</div>
		    					</div>
		    				</div>
	    				@endif
	    			</div>
	    		</div>
	    		
	    	</div>
	    </div>
	</div>
@endsection