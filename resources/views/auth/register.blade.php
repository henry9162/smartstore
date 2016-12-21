@extends('templates.default')

@section('content')

<div class="row">

	<div class="col-md-4">
		<div class="row">
			<h4>Your details</h4>

			<hr>

			{!! form::open(['route' => 'auth.postRegister', 'methdo' => 'POST', 'files' => true]) !!}

				{{ form::label('name', 'Full Name') }}
				{{ form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => '70']) }}

				{{ form::label('email', 'Email') }}
				{{ form::email('email', null, ['class' => 'form-control', 'required']) }}

				{{ form::label('password', 'Password') }}
				{{ form::password('password', ['class' => 'form-control', 'required']) }}<br><br>
		</div>
		<div class="row">
			{{ form::submit('Register shop', ['class' => 'btn btn-primary btn-block']) }}
		</div>
	</div>


	<div class="col-md-8">
		<h4>Store Profile/Details</h4>

		<hr>

		{{ form::label('store', 'Store Name') }}
		{{ form::text('store', null, ['class' => 'form-control', 'required', 'maxlength' => '100']) }}<br>

		{{ form::label('store_image', 'Store Image/Logo') }}
		{{ form::file('store_image') }}<br>

		{{ form::label('description', 'Store Description') }}
		{{ form::textarea('description', null, ['class' => 'form-control', 'required', 'placeholder' => 'Short store description...', 'rows' => '2', 'maxlength' => '50']) }}

		{{ form::label('address', 'Store Address') }}
		{{ form::text('address', null, ['class' => 'form-control', 'required', 'maxlength' => '100']) }}

		{{ form::label('city', 'State/City') }}
		{{ form::text('city', null, ['class' => 'form-control', 'required']) }}

		{{ form::label('area', 'Local Government Area') }}
		{{ form::text('area', null, ['class' => 'form-control', 'required']) }}

		{{ form::label('park', 'Nearest Bustop') }}
		{{ form::text('park', null, ['class' => 'form-control', 'required']) }}<br>

		{!! form::close() !!}

	</div>

</div>

@endsection

