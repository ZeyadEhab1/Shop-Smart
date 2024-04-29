<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Product extends Authenticatable {

	protected $fillable = array('name', 'photo', 'description', 'price');

	public function purchases(): BelongsToMany
    {
		return $this->belongsToMany('Purchase');
	}
    public function transactions(): HasMany
    {
        return $this->hasMany(LoyaltyWalletTransactionController::class);
    }
}
