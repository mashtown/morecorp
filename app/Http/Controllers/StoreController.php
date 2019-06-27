<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bidding;
use App\Product;

class StoreController extends Controller
{
    public function postBidding(Request $request){
    	$this->validate($request, [
            'email' => 'required',
            'price' => 'required'
        ]);

        // dd($request->product_id);

        $bidding = new Bidding;

        $bidding->product_id = $request->product_id;
        $bidding->email = $request->email;
        $bidding->price = $request->price;

        $product = Product::findOrFail($request->product_id);

        if($bidding->save()){
        	\Session::put('user_email', $request->email);
            return redirect($redirect_url)->with('status', 'Bidding successfully');
        }

        // dd($request->product_id);

        // $userBid = Bidding::firstOrNew(array('email' => $request->email));

        /*$user_bid = Bidding::updateOrCreate([
        	'product_id' 	=> $request->product_id,
        	'email' 		=> $request->email,
        	'price' 		=> $request->price,
        ]);

        if($user_bid->save()){
        	\Session::put('user_email', $request->email);
        	$redirect_url = '/product/'. $product->id . '/' . str_slug($product->name);
	        return redirect($redirect_url)->with('status', 'Bidding successfully');
        }else{
        	return redirect()->back()->withInput();
        }*/

        // dd($userBid);
        /*$redirect_url = '/product/'. $product->id . '/' . str_slug($product->name);

        if($userBid === null){

	        dd($bidding->product_id);
        	$bidding->save();
        	\Session::put('user_email', $request->email);
            return redirect($redirect_url)->with('status', 'Bidding successfully');

        }else{

        	$userBid->price = $request->price;

			if($userBid->save()){
	        	\Session::put('user_email', $request->email);
	            return redirect($redirect_url)->with('status', 'Bidding successfully');
	        }
        	
        }

        return redirect()->back()->withInput();*/
    }

    public function singleProduct($id, $slug){

        $product = Product::findOrFail($id);
        $highest_bidder = $product->bidings()->max('price');
        $average_bid = $product->bidings()->avg('price');
        $lowest_bidder = $product->bidings()->min('price');

        // dd(\Session::all());

        if(\Session::has('user_email')){
			$user_email = \Session::get('user_email');
			$your_bidding = Bidding::where('email', $user_email)->where('product_id', $id)->first();
			// dd($user_email);
        }

        // dd($your_bidding->price);

        if($product){
            $product->increment('views');
        }

        return view('store.products.single', [
        	'product' => $product,
        	'highest_bidder' 	=> $highest_bidder,
        	'lowest_bidder' 	=> $lowest_bidder,
        	'average_bid' 		=> $average_bid,
        	'your_bidding' 		=> ((!empty($your_bidding)) ? $your_bidding->price : 0 )
        ]);
    }
}
