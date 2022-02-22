<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders_user extends Model
{
    public $table = "orders_user"; 
    protected $guarded = []; 

	
	public function order_products(){
		return $this->hasMany('App\Order_products');
	}
}
