<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'code',
      'name',
      'description',
      'price',
      'quantity_on_hand',
      'img_default',
      'best_seller',
      'new_arrival',
      'best_deal',
      'category_id'
    ];

    public function category() {
      return $this->belongsTo('App\Category');
    }

    public function presentPrice() {
      return 'RM '.number_format( $this->price, 2);
    }

    public function scopeMightAlsoLike($query) {
      return $query->inRandomOrder()->take(4);
    }

    public function orders() {
      return $this->belongsToMany('App\Order')->withPivot('quantity');;
    }
}
