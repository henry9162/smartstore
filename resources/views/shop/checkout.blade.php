@extends('templates.default')

@section('content')
    <div class="row">
        {!! form::open(['route' => 'postCheckout', 'method' => 'POST']) !!}
        <div class="col-md-4 col-md-offset-2">
            <h3>Profile</h3>
            <hr>
            {{ form::label('name', 'Full Name') }}
            {{ form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => '70']) }}

            {{ form::label('contact', 'Mobile Number') }}
            {{ form::text('contact', null, ['class' => 'form-control', 'required']) }}

            {{ form::label('delivery', 'Address of Delivery') }}
            {{ form::text('delivery', null, ['class' => 'form-control', 'required', 'maxlength' => '70']) }}

            {{ form::label('park', 'Nearest bus park') }}
            {{ form::text('park', null, ['class' => 'form-control', 'required']) }}

        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="well">
                    <h4>Cart Sumarry</h4>
                    <hr>
                    
                    <div class="row">
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
                                        <td>{{$product['quantity']}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="col-md-5">
                            <h4>Total: ${{ $totalPrice }}</h4>
                        </div>
                        <div class="col-md-7">
                            {{ form::submit('Place Order', ['class' => 'btn btn-primary btn-block']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! form::close() !!}
    </div>
@endsection
