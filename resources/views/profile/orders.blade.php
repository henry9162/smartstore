@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <h2 class="text-center">My Orders</h2>
                <hr>
                
                @foreach($orders as $order)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="list-group">
                                @foreach($order->cart->items as $item)
                                    <li class="list-group-item">
                                        <span class="badge">{{ $item['price'] }} $</span>
                                        {{ $item['item']['title'] }} | {{ $item['quantity'] }} units
                                    </li>
                                @endforeach
                            </div>
                        </div>
                        <div class="panel-footer">
                            <strong>Total Price: ${{ $order->cart->totalPrice }}</strong>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="well">
                    Additional info here
                </div>
            </div>
        </div>
    </div>
@endsection

