<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  use softDeletes;
  public $guarded = [];


  public function category(){
  return $this->belongsTo('\App\Category', 'categorie_id');
  }

  public function carts(){
    return $this->hasMany('\App\Cart', 'product_id');
  }
}
