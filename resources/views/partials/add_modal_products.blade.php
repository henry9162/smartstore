<div class="modal fade" id="addProducts">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only"></span>
                    </button>
                    <h4 class="modal-title text-center">Add Product</h4>
                </div>
                <div class="modal-body">
                    
                    {!! form::open(['route' => 'product.store', 'method' => 'POST', 'files' => true]) !!}

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {{ form::label('title', 'Title') }}
                                </div>
                                <div class="col-md-8">
                                    {{ form::text('title', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>

                         <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {{ form::label('product_image', 'Product Image') }}
                                </div>
                                <div class="col-md-8">                           
                                    {{ form::file('product_image') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {{ form::label('description', 'Description') }}
                                </div>
                                <div class="col-md-8">
                                    {{ form::textarea('description', null, ['class' => 'form-control', 'rows' => '2']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {{ form::label('slug', 'Product Slug') }}
                                </div>
                                <div class="col-md-8">
                                    {{ form::text('slug', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {{ form::label('price', 'Price($)') }}
                                </div>
                                <div class="col-md-8">
                                    {{ form::text('price', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    {{ form::label('stock', 'Stock') }}
                                </div>
                                <div class="col-md-8">
                                    {{ form::text('stock', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>

                        
                         <div class="form-group">
                            <div class="row">                
                                <p class="text-center"> {{ form::submit('Add Product', ['class' => 'btn btn-primary btn-sm btn-block']) }}</p>                                        
                            </div>
                         </div>    

                    {!! form::close() !!}
                </div>
            </div>
        </div>
    </div>