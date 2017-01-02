@extends('templates.default')

@section('stylesheets')
	{!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')

<div class="row">

	<div class="col-md-4">
		<div class="row">
			<h4>Your details</h4>

			<hr>

			{!! form::open(['route' => 'auth.postRegister', 'method' => 'POST', 'files' => true]) !!}

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

		{{-- {{ form::label('category_id', 'Category') }}
			<select class="form-control" name="category_id">
				@foreach ($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>

		{{ form::label('city', 'State/City') }}
		{{ form::text('city', null, ['class' => 'form-control', 'required']) }} --}}

		{{ form::label('categories', 'Categories') }}
			<select class="form-control label-spacing-down select2-multi" name="categories[]" multiple="multiple">
				@foreach ($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>

		{{ form::label('area', 'Local Government Area') }}
		{{ form::text('area', null, ['class' => 'form-control', 'required']) }}

		{{ form::label('park', 'Nearest Bustop') }}
		{{ form::text('park', null, ['class' => 'form-control', 'required']) }}<br>

		{!! form::close() !!}

	</div>

</div>

@endsection

@section('scripts')
	{!! Html::script('js/select2.min.js') !!}
	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>
@endsection

