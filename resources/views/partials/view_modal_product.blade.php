<div class="modal fade" id="viewProduct">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only"></span>
                    </button>
                    <h2 class="modal-title text-center" style="color:brown;">{{ $product->detail->store }}</h2>
                </div>
                <div class="modal-body">
                    
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="thumbnail">
                                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->title }}">
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <h4 style="color:brown;"><strong>Description</strong></h4>
                            <hr>

                            <p>{{ $product->description }}</p>

                            <a href="#" class="btn btn-primary btn-sm">Add product for purchase</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>