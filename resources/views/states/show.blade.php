@extends('templates.default')

@section('content')

    <h4>All stores located in <span style="color:brown"><strong>{{ $state->name }}<strong></span></h4>

    <hr>

    <div class="row">
    	@foreach($state->details as $store)
    	<div class="col-md-2">
    		<a href="{{ route('store.index', $store->user->id) }}"><img class="img-responsive" src="{{ asset('images/' . $store->image) }}" width="100%" height="100%"  /></a>
    		<p class="text-center">{{ $store->store }}</p>
    	</div>
    	@endforeach
    </div>

@endsection

