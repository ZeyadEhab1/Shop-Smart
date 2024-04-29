<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class LoyaltyWallet extends Authenticatable {

	protected $fillable = array('user_id', 'balance');

	public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
	}

	public function transactions(): HasMany
    {
        return $this->hasMany(LoyaltyWalletTransaction::class);
	}

}
