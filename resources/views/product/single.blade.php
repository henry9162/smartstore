@extends('templates.default')

@section('styles')
  <style type="text/css">

     /* Enhance the look of the textarea expanding animation */
     .animated {
        -webkit-transition: height 0.2s;
        -moz-transition: height 0.2s;
        transition: height 0.2s;
      }

      .stars {
        margin: 20px 0;
        font-size: 24px;
        color: #d17581;
      }
  </style>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-9">

			<div class="row">
				<div class="col-md-6">

					<img class="img-responsive" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->title }}">

					<div class="ratings">
	                  	<p class="pull-right">{{$product->rating_count}} {{ str_plural('review', $product->rating_count)}}</p>
	                  	<p>
		                    @for ($i=1; $i <= 5 ; $i++)
		                      <span style="color:orange" class="glyphicon glyphicon-star{{ ($i <= $product->rating_cache) ? '' : '-empty'}}"></span>
		                    @endfor
		                    {{ number_format($product->rating_cache, 1)}} stars
	                  	</p>
	              	</div>

	              <div class="well" id="reviews-anchor">
			            <div class="row">
			                <div class="col-md-12">
			                  @if(Session::get('errors'))
			                    <div class="alert alert-danger">
			                      	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                      	<h5>There were errors while submitting this review:</h5>
			                       @foreach($errors->all('<li>:message</li>') as $message)
			                          {{$message}}
			                       @endforeach
			                    </div>
			                  @endif

			                  @if(Session::has('review_posted'))
			                    <div class="alert alert-success">
			                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                      <h5>Your review has been posted!</h5>
			                    </div>
			                  @endif

			                  @if(Session::has('review_removed'))
			                    <div class="alert alert-success">
			                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                      <h5>Your review has been removed!</h5>
			                    </div>
			                  @endif
			                </div>
			              </div>

			              <div class="text-right">
			                <a href="#reviews-anchor" id="open-review-box" class="btn btn-success btn-green">Leave a Review</a>
			              </div>

			              <div class="row" id="post-review-box" style="display:none;">
			                <div class="col-md-12">
				                {!! form::open([]) !!}
					                  {{Form::hidden('rating', null, array('id'=>'ratings-hidden'))}}

					                  {{Form::textarea('comment', null, array('rows'=>'5','id'=>'new-review','class'=>'form-control animated','placeholder'=>'Enter your review here...'))}}
					                  
					                  <div class="text-right">
					                    <div style="color:orange" class="stars starrr" data-rating="{{Request::old('rating',0)}}"></div>
					                    <a href="#" class="btn btn-danger btn-sm" id="close-review-box" style="display:none; margin-right:10px;"> <span class="glyphicon glyphicon-remove"></span>Cancel</a>
					                    <button class="btn btn-success btn-lg" type="submit">Save</button>
					                  </div>
				                {!! form::close() !!}
			                </div>
			              </div>

			              @foreach($reviews as $review)
			              	<hr>

			                <div class="row">
			                  <div class="col-md-12">
			                    @for ($i=1; $i <= 5; $i++)
			                      <span style="color:orange" class="glyphicon glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
			                    @endfor

			                    {{ $review->user ? $review->user->username : 'Anonymous'}} <span class="pull-right">{{$review->timeago}}</span> 
			                    
			                    <p>{{{$review->comment}}}</p>
			                  </div>
			                </div>
			              @endforeach
			              {{ $reviews->links() }}
		        	</div>

				</div>

				<div class="col-md-6">
					@if($product->hasLowStock())
						<span class="btn btn-danger btn-xs">Low Stock</span>
					@elseif($product->outOfStock())
						<span class="btn btn-danger btn-xs">Out of Stock</span>
					@endif

					<h3>{{ $product->title }}</h3>
					<p>Sold By: <span style="color:brown">{{ $product->detail->store }}</span></p>
					<hr>
					
					<p><strong>Description</strong></p>
					<p>{{ $product->description }}</p>
					<hr>

					<div class="row">
						<div class="col-md-8">
							<h4>$ {{ $product->price }}</h4>
						</div>
						<div class="col-md-4">
							@if($product->inStock())
								<p><a href="{{ route('product.cart', $product->id) }}" class="btn btn-warning btn-block btn-sm">Add to Cart</a></p>
							@endif
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="col-md-3">
			<div class="row">
				<div class="well" style="margin-top:40px">
					Some More store Details here!
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
  {{  Html::script('js/expanding.js')  }}
  {{  Html::script('js/starrr.js')  }}

  <script type="text/javascript">
    $(function(){

      // initialize the autosize plugin on the review text area
      $('#new-review').autosize({append: "\n"});

      var reviewBox = $('#post-review-box');
      var newReview = $('#new-review');
      var openReviewBtn = $('#open-review-box');
      var closeReviewBtn = $('#close-review-box');
      var ratingsField = $('#ratings-hidden');

      openReviewBtn.click(function(e)
      {
        reviewBox.slideDown(400, function()
          {
            $('#new-review').trigger('autosize.resize');
            newReview.focus();
          });
        openReviewBtn.fadeOut(100);
        closeReviewBtn.show();
      });

      closeReviewBtn.click(function(e)
      {
        e.preventDefault();
        reviewBox.slideUp(300, function()
          {
            newReview.focus();
            openReviewBtn.fadeIn(200);
          });
        closeReviewBtn.hide();
        
      });

      // If there were validation errors we need to open the comment form programmatically 
      @if($errors->first('comment') || $errors->first('rating'))
        openReviewBtn.click();
      @endif

      // Bind the change event for the star rating - store the rating value in a hidden field
      $('.starrr').on('starrr:change', function(e, value){
        ratingsField.val(value);
      });
    });
  </script>
@endsection


