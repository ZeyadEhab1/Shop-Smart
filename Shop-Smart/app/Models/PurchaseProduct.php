<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class PurchaseProduct extends Authenticatable {

	protected $fillable = array('purchase_id', 'product_id', 'quantity');

}
