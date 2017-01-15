@extends('templates.default')

@section('stylesheets')
	{!! Html::style('css/select2.min.css') !!}
@endsection


@section('content')
	<div class="row">
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-6">
					<h4>Profile</h4>
				</div>
				<div class="col-md-6">
					<a href="#" data-toggle="modal" data-target="#myModal3"  class="btn btn-primary btn-sm">Edit profile</a>
		        	@include('partials.edit_modal_profile')
		    	</div>
			</div>
			<hr>

			<dl class="dl-horizontal">
	            <label>Full Name:</label>
	            <span>{{ $store->user->getName() }}</span>
	        </dl>

			<dl class="dl-horizontal">
	            <label>Username:</label>
	            <span>{{ $store->user->username }}</span>
	        </dl>

	        <dl class="dl-horizontal">
	            <label>Email:</label>
	            <span>{{ $store->user->email }}</span>
	        </dl>

	        <dl class="dl-horizontal">
	            <label>Phone Number:</label>
	            <span>{{ $store->user->contact }}</span>
	        </dl>

	        <dl class="dl-horizontal">
	            <label>Location:</label>
	            <span>{{ Auth::user()->state->name }}</span>
	        </dl>
		</div>

		<div class="col-md-6 col-md-offset-1">
			<div class="row">
				<div class="col-md-6">
					<h4>Store Details</h4>
				</div>
				<div class="col-md-6">
					<a href="#" data-toggle="modal" data-target="#myModal4"  class="btn btn-primary btn-sm">Edit Store</a>
			        @include('partials.edit_modal_store')
			    </div>
			</div>
			<hr>

			<dl class="dl-horizontal">
	            <label>Store Name:</label>
	            <span>{{ $store->store }}</span>
	        </dl>

	        <dl class="dl-horizontal">
	            <label>Address:</label>
	            <span>{{ $store->address }}</span>
	        </dl>


	        <dl class="dl-horizontal">
	            <label>Description:</label>
	            <p>{{ $store->description }}<p>
	        </dl>

	        <dl class="dl-horizontal">
	            <label>Area:</label>
	            <span>{{ $store->area }}</span>
	        </dl>

	        <dl class="dl-horizontal">
	            <label>Closest Park:</label>
	            <span>{{ $store->park }}</span>
	        </dl>

	        <dl class="dl-horizontal">
	            <label>Categories:</label>
	            @foreach($store->categories as $category)
	            	<span class="label label-default">{{ $category->name }}</span>
	            @endforeach
	        </dl>
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="row">
			<div class="col-md-6">
				<h3 class="text-center">My Products</h3>
			</div>
			<div class="col-md-6">
				<p style="margin-top:16px;"><a href="#" data-toggle="modal" data-target="#addProducts" class="btn btn-primary btn-sm btn-block">Add Products</a></p>
				@include('partials.add_modal_products')
			</div>
		</div>
		<hr>

		<div class="row">
			@foreach($store->products as $product)
                    <div class="col-md-2">
                        <div class="thumbnail">
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->title }}">
                            <div class="caption">
                                <h6 style="color:orange;margin-top:5px;margin-bottom:2px;">{{ $product->title }} &nbsp; <span style="color:brown">${{ $product->price }}</span></h6>
                                <p style="color:grey;font-size:11px;">{{ substr($product->description, 0, 50) }}{{ strlen($product->description) > 50 ? "..." : "" }}</p>
                                <!-- <p class="text-center"><a href="#" data-toggle="modal" data-target="#viewProduct" class="btn btn-primary btn-xs">View</a></p> -->
                                 <p style="font-size:10px">
                                    <span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star-empty"></span>
                                    3 reviews
                                </p>
                                
                                <a href="#" data-toggle="modal" data-target="#editProduct" class="btn btn-warning btn-block btn-xs text-center">Edit</a>
                                @include('partials.edit_modal_product')
                            </div>
                        </div>
                    </div>
                 @endforeach
		</div>
		<hr>
	</div>
@endsection


@section('scripts')
	{!! Html::script('js/select2.min.js') !!}
	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>
@endsection

