@extends('templates/default')

@section('title', ' | All Categories')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-1">
            <h3>Categories</h3>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                  <tr>
                    <td>{{ $category->id }}</td>
                    <td><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></td>
                    <td><a href="#" data-toggle="modal" data-target="#allCategory" class="btn btn-default btn-xs btn-block">Edit</a></td>
                    @include('partials.edit_modal_category')
                    <td>
                        {!! form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}

                        {{ form::submit('Delete', ['class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("Are you sure?")']) }}

                        {!! form::close() !!}
                    </td>
                  </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        <div class="col-md-3 col-md-offset-1">
            <div class="well">
                <h4>New Category</h4>

                {!! form::open(['route' => 'categories.store', 'method' => 'POST']) !!}

                {{ form::label('name', 'Name') }}
                {{ form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Category name...']) }}

                {{ form::submit('Create category', ['class' => 'btn btn-primary btn-block btn-spacing']) }}

                {!! form::close() !!}
            </div>
        </div>

    </div>
@endsection

        