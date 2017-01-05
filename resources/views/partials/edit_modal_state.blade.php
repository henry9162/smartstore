<div class="modal fade" id="allState">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only"></span>
                    </button>
                    <h4 class="modal-title text-center">Edit State</h4>
                </div>
                <div class="modal-body">
                    
                    {!! form::model($state, ['route' => ['states.update', $state->id], 'method' => 'Put']) !!}

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    {{ form::label('name', 'Name') }}
                                </div>
                                <div class="col-md-9">
                                    {{ form::text('name', null, ['class' => 'form-control']) }}
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