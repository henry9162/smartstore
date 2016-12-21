@extends('templates.default')

@section('content')

    <h4>Shopping just got easier with <span style="color:brown"><strong>SmartStores!!<strong></span></h4>

    <hr>

    <div class="row">
    	@foreach($stores as $store)
    	<div class="col-md-3">
    		<a href="{{ route('store.index', $store->user->id) }}"><img class="img-responsive" src="{{ asset('images/' . $store->image) }}" width="100%" height="100%"  /></a>
    		<p class="text-center">{{ $store->store }}</p>
    	</div>
    	@endforeach
    </div>

@endsection
