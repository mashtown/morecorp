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
	    			@if($hasBiddings)
		    			<div class="bidders">
		    				<h3>Biddings</h3>
		    				<div class="row">
		    					<div class="col-sm-4">Lowest Bid:</div>
		    					<div class="col-sm-6"><strong>R{{ sprintf('%0.2f', $lowest_bidder) }}</strong></div>
		    				</div>
		    				<div class="row">
		    					<div class="col-sm-4">Average Bid:</div>
		    					<div class="col-sm-6"><strong>R{{ sprintf('%0.2f', $average_bid) }}</strong></div>
		    				</div>	    				
		    				<div class="row">
		    					<div class="col-sm-4">Highest Bid:</div>
		    					<div class="col-sm-6"><strong>R{{ sprintf('%0.2f', $highest_bidder) }}</strong></div>
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
		    		@endif
		    			<div class="m-t-15">
	                        <a class="btn btn-primary btn-block show-bid-form" role="button" data-toggle="collapse" href="#collapse{{ $product->id }}" aria-expanded="false" aria-controls="collapse{{ $product->id }}">bid now</a>

	                        <form method="post" action="/post-bidding" class="collapse bidding--form m-t-15" id="collapse{{ $product->id }}">
	                            {!! csrf_field() !!}
	                            <input type="hidden" name="product_id" value="{{ $product->id }}">
	                            <div class="form-group">
	                                <label for="name" class="sr-only">Email Address</label>
	                                <input type="text" class="form-control" id="email" name="email" placeholder="Email Address">
	                            </div>
	                            <div class="input-group">
	                                <label for="price" class="sr-only">Price</label>
	                                <span class="input-group-addon">R</span>
	                                @php $bid = ($product->price + ( $product->price * 0.15)); @endphp
	                                <input type="text" class="form-control" id="price" name="price" placeholder="00.00" value="{{ sprintf('%0.2f', $bid) }}">
	                            </div>
	                            <div class="form-group m-t-15">
	                                <button class="btn btn-primary btn-block" type="submit">Bid Now</button>
	                            </div>
	                        </form>
		    			</div>

	    		</div>
	    		
	    	</div>
	    </div>
	</div>
@endsection

@section('inline-scripts')
<script>
	$(document).ready(function(){
		$('.show-bid-form').on('click', function(e){
			$(this).addClass('hidden');
		});
	});
</script>
@endsection