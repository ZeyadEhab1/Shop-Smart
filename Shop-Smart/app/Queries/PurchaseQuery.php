<?php

namespace App\Queries;

use Illuminate\Database\Eloquent\Builder;

class PurchaseQuery extends Builder
{
    public function byDate(?string $startDate, ?string $endDate): PurchaseQuery|static
    {

        if ($startDate && $endDate) {
            return $this->whereBetween('created_at', [$startDate, $endDate]);
        }
        return $this;
    }

    public function byAmount(?float $minAmount, ?float $maxAmount): PurchaseQuery
    {
        if ($minAmount !== null && $maxAmount !== null) {
            return $this->whereBetween('total_price', [$minAmount, $maxAmount]);
        } elseif ($minAmount !== null) {
            return $this->where('total_price', '>=', $minAmount);
        } elseif ($maxAmount !== null) {
            return $this->where('total_price', '<=', $maxAmount);
        }
        return $this;
    }
    public function sortBy(?string $sortBy, string $sortOrder = 'asc')
    {
        if ($sortBy) {
            return $this->orderBy($sortBy, $sortOrder);
        }
        return $this;
    }
}
