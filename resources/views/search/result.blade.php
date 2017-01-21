@extends('templates/default')

@section('title', ' | All Candidates')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-6">
                    <form class="navbar-form navbar-left" role="search" action="{{ route('search.results') }}">
                        <div class="form-group">
                            <input type="text" name="query" class="form-control" placeholder="Find by subject">
                        </div>
                        <button type="submit">Search</button>
                    </form>
                </div>
            </div>
            <br><br><br>
            
                @if (!$ways->count())
                    <p>No results found, sorry.</p>
                @else
                    
                    <div class="row">
                        <h4>Candidate List</h4>
                        <hr>
                        <div class="col-lg-12">
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Candidates</th>
                                    <th>center</th>
                                    <th>Subject</th>
                                    <th>Category</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($ways as $way)
                                 @foreach($way->candidates as $candidate)
                                  <tr>
                                    <td>{{ $candidate->id }}</td>
                                    <td>{{ $candidate->name }}</td>
                                    <td>{{ $candidate->center->name }}</td>
                                    <td>{{ $candidate->subject->name }}</td>
                                    <td>{{ $candidate->way->name }}</td>
                                  </tr>
                                  @endforeach
                                @endforeach
                                </tbody>
                            </table>   
                        </div>
                    </div><hr>

                    <div class="row">
                        <h4>Subject List</h4>
                          <div class="col-lg-12">
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>subject</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($ways as $way)
                                 @foreach($way->candidates as $candidate)
                                  <tr>
                                    <td>{{ $candidate->id }}</td>
                                    <td>{{ $candidate->subject->name }}</td>
                                  </tr>
                                  @endforeach
                                @endforeach
                                </tbody>
                            </table>   
                        </div>  
                    </div>
                    @endif
                    
                
            </div>
    </div>

    <div class="row">
        <p class="text-center"><a href="{{ route('getSearch') }}" class="btn btn-primary btn-md">Dropdown Page</a></p>
    </div>
@endsection