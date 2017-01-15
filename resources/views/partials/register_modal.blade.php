<div class="modal fade" id="register">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only"></span>
                    </button>
                    <h4 class="modal-title text-center">Sign Up</h4>
                </div>
                <div class="modal-body">
                    <!-- Signin form -->
                    {!! form::open(['route' => 'auth.postRegister', 'method' => 'POST']) !!}   
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {{ form::label('first_name', 'First Name') }}
                                </div>
                                <div class="col-md-6">
                                    {{ form::text('first_name', null, ['class' => 'form-control', 'required']) }}
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {{ form::label('last_name', 'Last Name') }}
                                </div>
                                <div class="col-md-6">
                                    {{ form::text('last_name', null, ['class' => 'form-control', 'required']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {{ form::label('username', 'Username') }}
                                </div>
                                <div class="col-md-6">
                                    {{ form::text('username', null, ['class' => 'form-control', 'required']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {{ form::label('email', 'Email') }}
                                </div>
                                <div class="col-md-6">
                                    {{ form::email('email', null, ['class' => 'form-control', 'required']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {{ form::label('contact', 'Phone') }}
                                </div>
                                <div class="col-md-6">
                                    {{ form::text('contact', null, ['class' => 'form-control', 'required']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {{ form::label('state_id', 'City') }}
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" name="state_id">
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                         <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {{ form::label('password', 'Password') }}
                                </div>
                                <div class="col-md-6">
                                    {{ form::password('password', ['class' => 'form-control', 'required']) }}
                                </div>
                            </div>
                        </div>

                         <div class="form-group">
                            <div class="row">                
                                <p class="text-center"> {{  form::submit('Sign Up!', ['class' => 'btn btn-primary btn-sm btn-block']) }}</p>                                        
                            </div>
                         </div>    

                    {!! form::close() !!}