@extends('templates.default')

@section('content')
    @if(Session::has('cart'))
    <div class="row">
        <div class="col-md-10">
            <h4>You are currently shopping at <a href="{{ route('store.index', $product->detail->user->id) }}" style="color:brown">{{ $product->detail->store }}</a></h4>
        </div>
        <div class="col-md-2">
            <a href="{{ route('clearCart', $product->detail->id) }}" class="btn btn-danger btn-block btn-sm">Clear All</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-8">
            <div class="well">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product['item']['title'] }}</td>
                                <td>${{ $product['price'] }}</td>
                                <td>
                                    {!! form::open(['route' => ['product.updateShoppingCart', $product['item']['id']], 'method' =>'POST', 'class' => 'form-inline']) !!}
                                            <select class="form-control" name="quantity">
                                                @for ($i = 1; $i <= $product['item']['stock'];  $i++)
                                                    <option value="{{ $i }}" <?php if( $i == $product['quantity']){ echo "selected = \"selected\""; } ?> >{{ $i }}</option>
                                                @endfor

                                                <option value="0">Remove</option>

                                            {{ form::submit('Update', ['class' => 'btn btn-primary btn-xs']) }}
                                            </select>
                                    {!! form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-4">
            <div class="well">
                <h4>Cart Summary</h4>
                <hr>

                <table class="table">
                    <tr>
                        <td class="success">Total</td>
                        <td class="success">${{ $totalPrice }}</td>
                    </tr>
                </table>
                <a href="{{ route('checkout') }}" class="btn btn-primary btn-block">Checkout</a>
            </div>

        </div>
    </div>
    @else
        <h3 class="text-center">You have no item in your cart. <br><a href="{{ route('home') }}"><span style="color:orange"><strong>Start Shopping!</strong></span></a></h3>
    @endif

@endsection

