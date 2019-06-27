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

        $bidding = new Bidding;

        $bidding->product_id = $request->product_id;
        $bidding->email = $request->email;
        $bidding->price = $request->price;

        $product = Product::findOrFail($request->product_id);

        if($bidding->save()){
        	\Session::put('user_email', $request->email);
            $redirect_url = '/product/'. $product->id . '/' . str_slug($product->name);
            // /product/{{ $product['id'] }}/{{ str_slug($product['name'])
            return redirect($redirect_url)->with('status', 'Bidding successfully');
        }else{
            return redirect()->back()->withInput();
        }
    }

    public function singleProduct($id, $slug){

        $product = Product::findOrFail($id);
        $highest_bidder = $product->bidings()->max('price');
        $lowest_bidder = $product->bidings()->min('price');

        $user_email = \Session::get('user_email');
        $your_bidding = Bidding::where('email', $user_email)->where('product_id', $id)->first();

        // dd($your_bidding->price);

        /*if($product){
            $product->increment('views');
        }*/

        return view('store.products.single', [
        	'product' => $product,
        	'highest_bidder' => $highest_bidder,
        	'lowest_bidder' => $lowest_bidder,
        	'your_bidding' => ((!empty($your_bidding)) ? $your_bidding->price : 0 )
        ]);
    }
}
