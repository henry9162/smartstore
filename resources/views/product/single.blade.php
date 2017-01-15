@extends('templates.default')

@section('content')
	<div class="row">
		<div class="col-md-9">

			<div class="row">
				<div class="col-md-6">
					<img class="img-responsive" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->title }}">
				</div>

				<div class="col-md-6">
					@if($product->hasLowStock())
						<span class="btn btn-danger btn-xs">Low Stock</span>
					@elseif($product->outOfStock())
						<span class="btn btn-danger btn-xs">Out of Stock</span>
					@endif

					<h3>{{ $product->title }}</h3>
					<p>Sold By: <span style="color:brown">{{ $product->detail->store }}</span></p>
					<hr>
					
					<p><strong>Description</strong></p>
					<p>{{ $product->description }}</p>
					<hr>

					<div class="row">
						<div class="col-md-8">
							<h4>$ {{ $product->price }}</h4>
						</div>
						<div class="col-md-4">
							@if($product->inStock())
								<p><a href="{{ route('product.cart', $product->id) }}" class="btn btn-warning btn-block btn-sm">Add to Cart</a></p>
							@endif
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="col-md-3">
			<div class="row">
				<div class="well" style="margin-top:40px">
					Some More store Details here!
				</div>
			</div>
		</div>
	</div>
@endsection

