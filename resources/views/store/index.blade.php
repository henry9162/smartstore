@extends('templates.default')

@section('content')

	<h4>Welcome to <span style="color:brown"><i>{{ $store->store }}..</i></span></h4>

	<p>{{ $store->description }}</p>

@endsection
