@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <h2 class="text-center">My Orders</h2>
                <hr>
                @if(Auth::user()->orders->count() > 0 )
                    @foreach($orders as $order)
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Ordered from: <span style="font-size:18px">{{ $product->detail->store }}</span>&nbsp;<small>{{ date('M j, Y @ g:iA', strtotime($order->created_at)) }}</small>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->cart->items as $item)
                                            <tr>
                                                <td>{{ $item['item']['title'] }}</td>
                                                <td>{{ $item['quantity'] }}</td>
                                                <td><span class="badge">{{ $item['price'] }} $</span></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="panel-footer">
                                <strong>Total Price: ${{ $order->cart->totalPrice }}</strong>
                            </div>
                        </div>
                    @endforeach
                @else
                    
                    @foreach($orderss as $order)
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>Ordered by: <span style="font-size:18px">{{ $order->user->getName() }}</span>&nbsp;<small>{{ date('M j, Y @ g:iA', strtotime($order->created_at)) }}</small></p>  
                                        <p>Phone: <span style="font-size:15px">{{ $order->user->contact }}</span></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Delivery: <span style="font-size:15px">{{ $order->delivery }}</span></p>
                                        <p>City: <span style="font-size:15px">{{ $order->user->state->name }}</span></p>
                                    </div>   
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->cart->items as $item)
                                            <tr>
                                                <td>{{ $item['item']['title'] }}</td>
                                                <td>{{ $item['quantity'] }}</td>
                                                <td><span class="badge">{{ $item['price'] }} $</span></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="panel-footer">
                                <strong>Total Price: ${{ $order->cart->totalPrice }}</strong>
                            </div>
                        </div>
                        <hr>
                    @endforeach

                @endif
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

