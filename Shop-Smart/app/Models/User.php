<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = array('name', 'password', 'profile_pic', 'phone', 'email');

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }

    public function loyaltyWallet(): HasOne
    {
        return $this->hasOne(LoyaltyWallet::class);
    }
    public function redeems(): HasMany
    {
        return $this->hasMany(Redeem::class);
    }
    protected $casts = [
        'password' => 'hashed'
    ];

    public function getUserBalanceAttribute()
    {
        return $this->loyaltyWallet->balance;
    }
}
