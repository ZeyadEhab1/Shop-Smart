<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Redeem extends Model
{

    protected $fillable = array('loyalty_wallet_transaction_id', 'reward_id', 'product_id', 'user_id');

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(LoyaltyWalletTransaction::class, 'loyalty_wallet_transaction_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reward(): BelongsTo
    {
        return $this->belongsTo(Reward::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
