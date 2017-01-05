@extends('templates.default')

@section('stylesheets')
	{!! Html::style('css/select2.min.css') !!}
@endsection


@section('content')
	<div class="row">
		<div class="col-md-4">
			<h4>Profile</h4>
			<hr>

			<dl class="dl-horizontal">
	            <label>Name:</label>
	            <span>{{ $store->user->name }}</span>
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

	        <p><a href="#" data-toggle="modal" data-target="#myModal3"  class="btn btn-primary btn-block">Edit profile</a><p>
	        @include('partials.edit_modal_profile')
		</div>

		<div class="col-md-6 col-md-offset-1">
			<h4>Store Details</h4>
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

	        <p><a href="#" data-toggle="modal" data-target="#myModal4"  class="btn btn-primary btn-block">Edit Details</a></p>
	        @include('partials.edit_modal_store')
		</div>
	</div>
@endsection


@section('scripts')
	{!! Html::script('js/select2.min.js') !!}
	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>
@endsection

