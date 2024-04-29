<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reward extends Model
{

    protected $fillable = array('name', 'description', 'points');

    public function redeems(): HasMany
    {
        return $this->hasMany(Redeem::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(LoyaltyWalletTransaction::class);
    }

}
