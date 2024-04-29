<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LoyaltyWalletTransaction extends Model
{

    protected $fillable = array('loyalty_wallet_id', 'balance_before', 'amount', 'type', 'balance_after', 'description');

    public function wallet(): HasOne
    {
        return $this->hasOne(LoyaltyWallet::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function reward(): BelongsTo
    {
        return $this->belongsTo(Reward::class);
    }

    public function redeems(): HasMany
    {
        return $this->hasMany(Redeem::class);
    }

}
