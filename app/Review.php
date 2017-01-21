<?php

namespace SmartStore;

use Auth;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    
    // Validation rules for the ratings
     public function user()
    {
        return $this->belongsTo('SmartStore\User');
    }

    public function getCreateRules()
    {
        return array(
            'comment'=>'required|min:5',
            'rating'=>'required|integer|between:1,5'
        );
    }

    // Relationships

    public function reviewable()
    {
    	return $this->morphTo();
    }

    // Scopes
    public function scopeApproved($query)
    {
       	return $query->where('approved', true);
    }

    public function scopeSpam($query)
    {
       	return $query->where('spam', true);
    }

    public function scopeNotSpam($query)
    {
       	return $query->where('spam', false);
    }

    // Attribute presenters
    public function getTimeagoAttribute()
    {
    	$date = \Carbon\Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
    	return $date;
    }

    // this function takes in product ID, comment and the rating and attaches the review to the product by its ID, then the average rating for the product is recalculated
    public function storeReviewForProduct($slug, $comment, $rating)
    {
        $product = Product::where('slug', '=', $slug)->first();

        //dd($product);

        $this->user_id = Auth::user()->id;
        $this->comment = $comment;
        $this->rating = $rating;
        $product->reviews()->save($this);

        // recalculate ratings for the specified product
        $product->recalculateRating($rating);
    }


    public function storeReviewForStore($id, $comment, $rating)
    {
        $store = Detail::where('id', '=', $id)->first();

        //dd($product);

        $this->user_id = Auth::user()->id;
        $this->comment = $comment;
        $this->rating = $rating;
        $store->reviews()->save($this);

        // recalculate ratings for the specified product
        $store->recalculateRating($rating);
    }


}