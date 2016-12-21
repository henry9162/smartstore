@extends('templates.default')

@section('content')
	This is the admin page
@endsection

{{-- @section('title', ' | Admin page')

@section('content')
	<div class="row">

		{!! form::model($store, ['route' => ['store.update', $store->id], 'method' => 'Put', 'files' => true]) !!}

			<div class="col-md-8">
				<h4>Edit Post</h4>
				<hr>
				{{ form::label('store', 'Store name') }}
				{{ form::text('store', null, ['class' => 'form-control']) }}

				{{ form::label('store_image', 'Image') }}
				{{ form::file('store_image') }}

				{{ form::label('address', 'Address') }}
				{{ form::text('address', null, ['class' => 'form-control']) }}

				{{ form::label('dscription', 'Description') }}
				{{ form::textarea('description', null, ['class' => 'form-control']) }}

				{{ form::label('city', 'City') }}
				{{ form::text('city', null, ['class' => 'form-control']) }}

				{{ form::label('area', 'Area') }}
				{{ form::text('area', null, ['class' => 'form-control']) }}

				{{ form::label('park', 'Park') }}
				{{ form::text('park', null, ['class' => 'form-control']) }}

			</div>

			<div class="col-md-4">
				<div class="well">
					<dl>
						<dt>Created at: </dt>
						<dd>{{ date('M j, Y h:ia', strtotime($store->created_at)) }}</dd>
					</dl>
					<dl>
						<dt>Updated at: </dt>
						<dd>{{ date('M j, Y h:ia', strtotime($store->updated_at)) }}</dd>
					</dl>
					<hr>

					<div class="row">
						<div class="col-md-6">
							<a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger btn-block">Cancel</a>
						</div>
						<div class="col-md-6">
							{{ form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
						</div>
					</div>
				</div>
			</div>

		{!! form::close() !!}
	</div>
@endsection --}}

