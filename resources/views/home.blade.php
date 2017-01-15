@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h4>Shopping just got easier with <span style="color:brown"><strong>SmartStores!!<strong></span></h4>
        </div>
        <div class="col-md-4">
            @if(!Auth::check())
                <a href="{{ route('showCreateStore') }}" class="btn btn-primary btn-block">Create Store</a>
            @elseif(Auth::check() && !Auth::user()->details )
                 <a href="{{ route('showCreateStore') }}" class="btn btn-primary btn-block">Create Store</a>
            @endif
        </div>
    </div>  

    <hr>

    <div class="row">
    	@foreach($stores as $store)
        	<div class="col-md-3" style="margin: 5px 0px">
        		<div class="row" style="border:solid 1px lightblue;margin-right:1px;">
                    <div class="col-md-6">
                        <p class="text-center" style="margin-bottom:0px;font-size:12px;">
                            <a href="{{ route('store.index', $store->user->id) }}">{{ $store->store }}</a>
                        </p>
                        <div class="row">
                            <p style="margin-bottom:0px;font-size:11px;">Categories:
                                @foreach($store->categories as $category)
                                    <span style="color:brown;">{{ $category->name }},</span>
                                @endforeach
                            </p>
                        </div>
                        <div class="row">
                            <div class="products">
                                <p style="margin-bottom:0px;font-size:11px;">Products:
                                    @foreach($store->products->take(5) as $product)
                                        <span style="fonts-size:5px;color:orange">{{ $product->title }},</span>
                                    @endforeach
                                    <a href="{{ route('store.index', $store->user->id) }}" style="text-decoration:none">
                                        <span style="fonts-size:5px;color:grey">...see more</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <a href="{{ route('store.index', $store->user->id) }}"><img class="img-responsive" src="{{ asset('images/' . $store->image) }}" width="100%" height="100%"  /></a>
                        </div>
                    </div>
                </div>
        	</div>
    	@endforeach
    </div>

@endsection





