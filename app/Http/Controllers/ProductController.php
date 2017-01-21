<?php

namespace SmartStore\Http\Controllers;

use SmartStore\Cart;

use Illuminate\Http\Request;

use SmartStore\Product;

use SmartStore\Detail;

use SmartStore\Order;


use SmartStore\Review;

use Image;

use Auth;

use Storage;

use Session;

use Input;

use Validator;

class ProductController extends Controller
{
	protected $product;

	public function __construct(Product $product)
	{

		$this->product = $product->all();
	}
    
	public function createProduct(Request $request)
	{

		$this->validate($request, [
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:products,slug',
            'description' => 'required',
            'product_image' => 'required|image',
            'price' => 'required|integer',
            'stock' => 'required|integer'
        ]);

		if ($request->hasFile('product_image'))
        {
            $image = $request->file('product_image');
            $filename = time(). '.' .$image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 600)->save($location);

            $product = Product::create([

	            'title' => $request->input('title'),
	            'slug' => $request->input('slug'),
	            'description' => $request->input('description'),
	            'image' => $filename,
	            'price' => $request->input('price'),
	            'stock' => $request->input('stock'),
	            'detail_id' => Auth::user()->details->id,
	        ]);

        }

	return redirect()->back()->with('info', 'Successfully added product');

	}


	public function updateProduct(Request $request, $productId)
	{

		$this->validate($request, [
            'title' => 'required|max:255',
            'slug' => "required|alpha_dash|min:5|max:255|unique:products,slug,$productId",
            'description' => 'required',
            'product_image' => 'required|image',
            'price' => 'required|integer',
            'stock' => 'required|integer'
        ]);

        $product = Product::find($productId);

        if($request->hasFile('product_image'))
        {
            $image = $request->file('product_image');
            $filename = time(). '.' .$image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 600)->save($location);

            $oldImageFile = $product->image;

            $product->update([
                'title' => $request->input('title'),
	            'slug' => $request->input('slug'),
	            'description' => $request->input('description'),
	            'image' => $filename,
	            'price' => $request->input('price'),
	            'stock' => $request->input('stock'),
	            //'detail_id' => Auth::user()->details->id,
            ]) ? $product : false;

            Storage::delete($oldImageFile);
        }

        return redirect()->back()->with('info', 'Successfully updated product');
	}


	public function getSingle($slug)
	{

		$product = Product::where('slug', '=', $slug)->first();

		$reviews = $product->reviews()->with('user')->approved()->notSpam()->orderBy('created_at','desc')->paginate(100);

		return view('product.single')->withProduct($product)->withReviews($reviews);
	}


	public function getAddToCart(Request $request, $id)
	{

		$product = Product::find($id);

		$oldcart = Session::has('cart') ? Session::get('cart') : null;

		$cart = new Cart($oldcart);

		$cart->add($product, $product->id);

		//dd($cart);

		$request->session()->put('cart', $cart);
		return redirect()->route('store.index', $product->detail->user->id);
	}

	public function getUpdateToCart(Request $request, $id)
	{

		$product = Product::find($id);

		$oldcart = Session::has('cart') ? Session::get('cart') : null;

		$cart = new Cart($oldcart);

		$cart->update($product, $request->input('quantity'));

		//dd($cart);

		if (count($cart->items) > 0){
			$request->session()->put('cart', $cart);
		} else {
			Session::forget('cart');
		}

		
		return redirect()->back();
	}


	public function getCart()
	{
		if (!Session::has('cart')){

			return view('shop.shopping-cart');
		}

		$oldcart = Session::get('cart');

		$cart = new Cart($oldcart);

		foreach($cart->items as $item){

			$product = $item['item'];
		}

		return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'product' => $product]);
	}


	public function clearCart($id)
	{
		$store = Detail::find($id);

		if (!Session::has('cart')){

			return view('shop.shopping-cart');
		} elseif (Session::has('cart')){
	
			Session::forget('cart');
		}

		return redirect()->route('store.index', $store->user->id);
	}


	public function getCheckout()
	{

		if (!Session::has('cart')){

			return view('shop.shopping-cart');
		}

		$oldcart = Session::get('cart');

		$cart = new Cart($oldcart);

		$products = $cart->items;

		$total = $cart->totalPrice;

		return view('shop.checkout', ['products' => $products, 'totalPrice' => $total]);
	}


	public function postCheckout(Request $request)
	{
		if (Session::has('cart')){

			$this->validate($request, [
				'name' => 'required|max:255',
		        'delivery' => 'required|max:255',
		        'park' => 'required|max:255'
		    ]);

			$oldcart = Session::get('cart');
			$cart = new Cart($oldcart);
			$products = [];
			foreach ($cart->items as $item) {
				$products[] = $item['item']['id'];
			}
			$hash = str_random(40);

			$order = new Order;

		    $order->name = $request->name;
		    $order->contact = $request->contact;
		    $order->cart = serialize($cart);
		    $order->hash = $hash;
		    $order->delivery = $request->delivery;
		    $order->park = $request->park;
		    $order->user_id = Auth::user()->id;


		    foreach($cart->items as $item){
		    	$value = $item['item'];
		    }

		    $order->detail_id = $value->detail->id;

		    $order->save();

		    $order->products()->sync($products, false);
		}

		Session::forget('cart');

		return redirect()->route('orders')->with('info', 'Your order was  Successful!, you will be contacted within 24 hours.');
	}


	public function getOrder()
	{

		$orders = Auth::user()->orders;

		$orders->transform(function($order, $key) {
			$order->cart = unserialize($order->cart);
			return $order;
		});

		if($orders->count() > 0){

			foreach ($orders as $order) {
			
					foreach($order->cart->items as $item){

					$product = $item['item'];
				}
			} 

		return view('profile.orders')->withOrders($orders)->withProduct($product);

		} else {

			$store = Auth::user()->details;

			$storeOrders = Order::where('detail_id', '=', $store->id)->get();

			$storeOrders->transform(function($order, $key) {
				$order->cart = unserialize($order->cart);
				return $order;
			});

			$orderss = [];
			foreach ($storeOrders as $order) {
				$orderss[] = $order;
			}

			return view('profile.orders')->withorderss($orderss);
		}

	}



	public function postReview(Request $request, $slug)
	{
		//dd($slug);
		$input = array(
			'comment' => $request->input('comment'),
			'rating'  => $request->input('rating')
		);
		// instantiate Rating model
		$review = new Review;

		// Validate that the user's input corresponds to the rules specified in the review model
		$validator = Validator::make( $input, $review->getCreateRules());

		// If input passes validation - store the review in DB, otherwise return to product page with error message 
		if ($validator->passes()) {
			$review->storeReviewForProduct($slug, $input['comment'], $input['rating']);
			return redirect()->back()->with('review_posted',true);
		}
		
		return redirect()->back()->withErrors($validator)->withInput();
	}

	
}
