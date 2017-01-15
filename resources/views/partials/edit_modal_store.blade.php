<div class="modal fade" id="myModal4">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only"></span>
                    </button>
                    <h4 class="modal-title text-center">Edit Store</h4>
                </div>
                <div class="modal-body">
                    
                    {!! form::model($store, ['route' => ['store.update', $store->user->id], 'method' => 'Put', 'files' => true]) !!}

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {{ form::label('store', 'Name') }}
                                </div>
                                <div class="col-md-8">
                                    {{ form::text('store', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>

                         <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {{ form::label('store_image', 'Store Image/Logo') }}
                                </div>
                                <div class="col-md-8">                           
                                    {{ form::file('store_image') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {{ form::label('address', 'Address') }}
                                </div>
                                <div class="col-md-8">
                                    {{ form::text('address', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {{ form::label('description', 'Description') }}
                                </div>
                                <div class="col-md-8">
                                    {{ form::textarea('description', null, ['class' => 'form-control', 'rows' => '2', 'maxlength' => '50']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {{ form::label('categories', 'Category') }}
                                </div>
                                <div class="col-md-8">
                                    {{ form::select('categories[]', $categories, $names, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {{ form::label('area', 'Area') }}
                                </div>
                                <div class="col-md-8">
                                    {{ form::text('area', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {{ form::label('park', 'Email') }}
                                </div>
                                <div class="col-md-8">
                                    {{ form::text('park', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>

                         <div class="form-group">
                            <div class="row">                
                                <p class="text-center"> {{ form::submit('Update Store', ['class' => 'btn btn-primary btn-sm']) }}</p>                                        
                            </div>
                         </div>    

                    {!! form::close() !!}
                </div>
            </div>
        </div>
    </div>