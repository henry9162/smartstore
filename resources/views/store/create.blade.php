@extends('templates.default')

@section('stylesheets')
	{!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-1">
			<h3>Create your <span style="color:brown">store!</span></h3>
			<hr>
			{!! form::open(['route' => 'createStore', 'method' => 'POST', 'files' => true]) !!}

				{{ form::label('store', 'Store Name') }}
				{{ form::text('store', null, ['class' => 'form-control', 'required', 'maxlength' => '100']) }}<br>

				{{ form::label('store_image', 'Store Image/Logo') }}
				{{ form::file('store_image') }}<br>

				{{ form::label('description', 'Store Description') }}
				{{ form::textarea('description', null, ['class' => 'form-control', 'required', 'placeholder' => 'Short store description...', 'rows' => '2', 'maxlength' => '50']) }}

				{{ form::label('address', 'Store Address') }}
				{{ form::text('address', null, ['class' => 'form-control', 'required', 'maxlength' => '100']) }}

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

				{{ form::submit('Create Store', ['class' => 'btn btn-primary btn-md btn-block']) }}<br><br><br>

			{!! form::close() !!}

		</div>

		<div class="col-md-4 col-md-offset-1">
			<div class="row">
				<div class="well">
					Additional Info here
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	{!! Html::script('js/select2.min.js') !!}
	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>
@endsection