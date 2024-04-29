<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Reward extends Authenticatable {

	protected $fillable = array('name', 'description', 'points');

	public function redeems(): HasMany
    {
		return $this->hasMany(Redeem::class);
	}
    public function transactions(): HasMany
    {
        return $this->hasMany(LoyaltyWalletTransactionController::class);
    }

}
