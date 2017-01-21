@extends('templates/default')

@section('title', ' | All Candidates')

@section('content')
    
    <div class="row">
        <h2 class="text-center">All Candidates</h2>
        <hr>
        <div class="col-md-8 col-md-offset-2">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Candidates</th>
                        <th>Center</th>
                         <th>Categories</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($candidates as $candidate)
                      <tr>
                        <td>{{ $candidate->id }}</td>
                        <td>{{ $candidate->name }}</td>
                        <td>{{ $candidate->center->name }}</td>
                        <td>{{ $candidate->way->name }}</td>
                      </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    </div>

    <div class="row">
        <p class="text-center"><a href="{{ route('search.results') }}" class="btn btn-primary btn-xs">Search Page</a></p>
    </div>
@endsection

        