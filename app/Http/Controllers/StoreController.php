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
            $redirect_url = '/product/'. $product->id . '/' . str_slug($product->name);
            // /product/{{ $product['id'] }}/{{ str_slug($product['name'])
            return redirect($redirect_url)->with('status', 'Bidding successfully');
        }else{
            return redirect()->back()->withInput();
        }
    }

    public function singleProduct($id, $slug){

        $product = Product::findOrFail($id);

        dd($product);

        if($product->save()){
            $redirect_url = '/product/'. $product->id . '/' . str_slug($product->name);
            // /product/{{ $product['id'] }}/{{ str_slug($product['name'])
            return redirect($redirect_url)->with('status', 'Bidding successfully');
        }else{
            return redirect()->back()->withInput();
        }
    }
}
