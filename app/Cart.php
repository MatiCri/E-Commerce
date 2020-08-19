<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
  use softDeletes;
  protected $guarded=[];

  public function users(){
    return $this->belongsTo('\App\User', 'user_id');
  }

  public function products(){
    return $this->belongsTo('\App\Product', 'product_id');
  }
}
