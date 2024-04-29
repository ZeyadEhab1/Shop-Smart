<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseProduct extends Model
{

    protected $fillable = array('purchase_id', 'product_id', 'quantity');

}
