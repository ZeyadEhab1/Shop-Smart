<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = array('name', 'photo', 'description', 'price');

    public function purchases(): BelongsToMany
    {
        return $this->belongsToMany('Purchase');
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(LoyaltyWalletTransaction::class);
    }
}
