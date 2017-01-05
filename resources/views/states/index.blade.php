@extends('templates/default')

@section('title', ' | All State')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-1">
            <h3>States</h3>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($states as $state)
                  <tr>
                    <td>{{ $state->id }}</td>
                    <td><a href="{{ route('states.show', $state->id) }}">{{ $state->name }}</a></td>
                    <td><a href="#" data-toggle="modal" data-target="#allState" class="btn btn-default btn-xs btn-block">Edit</a></td>
                    @include('partials.edit_modal_state')
                    <td>
                        {!! form::open(['route' => ['states.destroy', $state->id], 'method' => 'DELETE']) !!}

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
                <h4>Add State</h4>

                {!! form::open(['route' => 'states.store', 'method' => 'POST']) !!}

                {{ form::label('name', 'Name') }}
                {{ form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Add state...']) }}

                {{ form::submit('Add state', ['class' => 'btn btn-primary btn-block btn-spacing']) }}

                {!! form::close() !!}
            </div>
        </div>

    </div>
@endsection

        