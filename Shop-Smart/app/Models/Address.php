<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Address extends Authenticatable {

	protected $fillable = array('user_id', 'country', 'state', 'city', 'street_name', 'building_number', 'floor_number', 'apartment_number', 'additional_details');

	public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
	}

	public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
	}

}
