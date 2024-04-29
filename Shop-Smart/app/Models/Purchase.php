<?php

namespace App\Models;

use App\Queries\PurchaseQuery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Purchase extends Model
{

    protected $fillable = array('user_id', 'address_id', 'total_price');

    public function newEloquentBuilder($query): PurchaseQuery
    {
        return new PurchaseQuery($query);
    }

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
        return $this->belongsToMany(Product::class, 'purchase_products')->withPivot('quantity');
    }

}
