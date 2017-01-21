@extends('templates/default')

@section('title', ' | All Candidates')

@section('content')
    <br><br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-3 col-md-offset-4">
                    {!! form::open(['route' => 'getSearch', 'class' => 'form-inline']) !!}

                        
                        <select class="form-control" name="query">
                            @foreach ($wayss as $way)
                                <option value="{{ $way->id }}">{{ $way->name }}</option>
                            @endforeach
                        </select>

                        {{ form::submit('Sort', ['class' => 'btn btn-primary btn-xs']) }}

                    {!! form::close() !!}
                </div>
            </div>
            <br><br>
            
                @if (!$ways->count())
                    <p>No results found, sorry.</p>
                @else
                    
                    <div class="row">
                        <h3>Candidate List</h3>
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
                        <div class="col-md-12">
                            <h3>Subject List</h3>
                              <div class="col-lg-12">
                                <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>subject</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subjects as $subject)
                                     
                                      <tr>
                                        <td>{{ $subject->id }}</td>
                                        <td>{{ $subject->name }}</td>
                                      </tr>
                                      
                                    @endforeach
                                    </tbody>
                                </table>   
                            </div> 
                        </div> 
                    </div>
                    @endif
            </div>
    </div>
@endsection