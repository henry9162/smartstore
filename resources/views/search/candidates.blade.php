@extends('templates/default')

@section('title', ' | All Categories')

@section('content')
<br><br>
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Categories</th>
                    <th>Candidate</th>
                    <th>Subject</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($ways as $way)
                  <tr>
                    <td>{{ $way->id }}</td>
                    <td>{{ $way->name }}</td>
                    <td>{{ $way->candidates->count() }}</td>
                    <td>{{ $way->subjects->count() }}</td>
                  </tr>
                 
                @endforeach
                </tbody>
            </table>   
        </div>
    </div>
@endsection