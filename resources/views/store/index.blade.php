@extends('templates.default')

@section('content')

	<div class="row">
		<div class="col-md-8">
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
		</div>

		<div class="col-md-4">
			<div class="row">
				<div class="well">
                    <div class="row">
                        <div class="col-md-6">
        					<h4><span style="color:brown">Store Details</span></h4>
                        </div>

                        <div class="col-md-6 editDetails">
                            @if(Auth::check())
                                @if(Auth::user()->id == $store->user->id)
                                    <a href="{{ route('profile.index', $store->user->id) }}" class="btn btn-warning btn-block btn-sm">Edit Details</a>
                                @endif
                            @endif
                        </div>
                    </div>

					<hr>
                    
					<dl class="dl-horizontal">
                        <label>Store Owner:</label>
                        <a href="#">{{ $store->user->name }}</a >
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Email Address:</label>
                        <a href="#">{{ $store->user->email }}</a >
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Phone Number:</label>
                        <span>{{ $store->user->contact }}</span>
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Store Area:</label>
                        <span>{{ $store->area }}</span>
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Closest Park:</label>
                        <span>{{ $store->park }}</span>
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Store Address:</label>
                        <span>{{ $store->address }}</span>
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Categories:</label>
                        @foreach($store->categories as $category)
                        	<span class="label label-default">{{ $category->name }}</span>
                        @endforeach
                    </dl>
                    
				</div>
			</div>
		</div>
	</div>

@endsection
