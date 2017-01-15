@extends('templates.default')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<div class="row">
				<div class="col-md-3">
					<img class="img-responsive" src="{{ asset('images/' . $store->image) }}" width="100%" height="100%"  />
				</div>
				<div class="col-md-9">
					<h4>Welcome to <span style="color:brown"><i>{{ $store->store }}..</i></span></h4>

					<p>{{ $store->description }}</p>
				</div>
			</div>
			<hr>

            <div class="row">
                @foreach($store->products as $product)
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->title }}">
                            <div class="caption">
                                <h4 class="text-center" style="color:brown;margin-top:5px;margin-bottom:2px;"><strong>{{ $product->title }}</strong></h4>
                                <h3 class="text-center" style="color:grey;margin:15px 0px">${{ $product->price }}</h3>
                                <p class="text-center"><a href="{{ route('product.single', $product->slug) }}" class="btn btn-warning btn-xs"  style="width:80px;">View</a></p>
                                <p class="text-center"><a href="{{ route('product.cart', $product->id) }}" class="btn btn-warning btn-xs" style="width:80px;margin-bottom:20px">Add to Cart</a></p>
                                <!-- <p class="text-center"><a href="#" data-toggle="modal" data-target="#viewProduct" class="btn btn-primary btn-xs">View</a></p> -->
                                 <p style="font-size:10px">
                                    <span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star-empty"></span>
                                    3.7
                                </p>
                            </div>
                        </div>
                    </div>
                 @endforeach
            </div>

		</div>

		<div class="col-md-2">
			<div class="row">
				<div class="well">
        			<h4><span style="color:brown">About Store</span></h4>
                    
					<dl class="dl-horizontal" style="margin-bottom:5px">
                        <label>Owner:</label>
                        <a href="#">{{ $store->user->getName() }}</a >
                    </dl>

                    <dl class="dl-horizontal" style="margin-bottom:5px">
                        <label>Email:</label>
                        <a href="#">{{ $store->user->email }}</a >
                    </dl>

                    <dl class="dl-horizontal" style="margin-bottom:5px">
                        <label>Phone:</label>
                        <a href="#">{{ $store->user->contact }}</a >
                    </dl>

                    <dl class="dl-horizontal" style="margin-bottom:5px">
                        <label>Address:</label>
                        <a href="#">{{ $store->address }}</a >
                    </dl>
                    
				</div>
			</div>
		</div>
	</div>

@endsection
