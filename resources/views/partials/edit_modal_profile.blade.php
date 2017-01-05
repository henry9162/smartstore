<div class="modal fade" id="myModal3">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only"></span>
                    </button>
                    <h4 class="modal-title text-center">Edit Profile</h4>
                </div>
                <div class="modal-body">
                    
                    {!! form::open(['route' => 'profile.update', 'method' => 'POST']) !!}

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    {{ form::label('name', 'Name') }}
                                </div>
                                <div class="col-md-9">
                                    {{ form::text('name', Auth::user()->name, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>

                         <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    {{ form::label('email', 'Email') }}
                                </div>
                                <div class="col-md-9">
                                    {{ form::email('email', Auth::user()->email, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    {{ form::label('contact', 'Mobile Number') }}
                                </div>
                                <div class="col-md-9">
                                    {{ form::text('contact', Auth::user()->contact, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    {{ form::label('state_id', 'Location') }}
                                </div>
                                <div class="col-md-9">
                                    {{ form::select('state_id', $states, null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>

                         <div class="form-group">
                            <div class="row">                
                                <p class="text-center"> {{ form::submit('Update', ['class' => 'btn btn-primary btn-sm btn-block']) }}</p>                                        
                            </div>
                         </div>    

                    {!! form::close() !!}
                </div>
            </div>
        </div>
    </div>