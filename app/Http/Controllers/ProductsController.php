<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$user = auth()->user();
		// dd($user->products);
    	$users_products = $user->products;
    	$products = [];
    	foreach ($users_products as $key => $product) {
    		// dd($product);
    		$products[] = $product;
    		$products[$key]['lowest_bid'] = $product->bidings()->min('price');
    		$products[$key]['average_bid'] = $product->bidings()->average('price');
    		$products[$key]['highest_bid'] = $product->bidings()->max('price');
    		// $products[$key]['biddings'] = $product->bidings;
    		// dd($products);
    		// dd($product->bidings);
    	}

    	// $users_products = $user->products()->get()->toArray();
    	// dd($users_products);
    	return view('products.index', ['products' => $products]);
    }

    public function create(){
    	return view('products.create');
    }

    public function postCreate(Request $request){
    	$this->validate($request, [
            'name' => 'required',
            'sku' => 'required',
            'price' => 'required',
        ]);

        $product = new Product;

        $product->user_id = $request->user_id;
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;

        if($product->save()){
            $redirect_url = '/dashboard/products/edit/'. $product->id;
            return redirect($redirect_url)->with('status', 'Product created successfully');
        }else{
            return redirect()->back()->withInput();
        }
    }

    public function edit($id){
    	$product = Product::findOrFail($id);
    	return view('products.edit', ['product' => $product]);
    }

    public function postEdit(Request $request){
    	$product = Product::findOrFail($request->product_id);
    	
    	if($product->fill($request->input())->save()){
    		return redirect('/dashboard/products');
    	}else{
    		return redirect()->back()->with('error', 'Oops! something went wrong');
    	}    	
    }

    public function delete($id){
    	$product = Product::findOrFail($id);
    	if($product->delete()){
    		return redirect('/dashboard/products')->with('status', 'Products successfully deleted.');
    	}else{
    		return redirect()->back()->with('error', 'Oops! something went wrong');
    	}
    }
}
