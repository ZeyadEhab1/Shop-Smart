<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Purchase extends Authenticatable {

	protected $fillable = array('user_id', 'address_id', 'total_price');

	public function user(): BelongsTo
    {
		return $this->belongsTo(User::class);
	}

	public function address(): BelongsTo
    {
		return $this->belongsTo(Address::class);
	}

	public function products(): BelongsToMany
    {
		return $this->belongsToMany(Product::class , 'purchase_products')->withPivot('quantity');
	}

}
