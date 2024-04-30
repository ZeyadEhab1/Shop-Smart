<?php

namespace App\Http\Controllers;

use App\Http\Resources\PurchaseResource;
use App\Models\Purchase;
use App\Queries\PurchaseQuery;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function __invoke(Request $request): AnonymousResourceCollection
    {

        $purchases = Purchase::with(['products', 'address'])
            ->where('user_id', auth()->id())
            ->byDate($request->input('start_date'), $request->input('end_date'))
            ->byAmount($request->input('min_amount'), $request->input('max_amount'))
            ->sortBy($request->input('sort_by'), $request->input('sort_order', 'asc'))
            ->paginate();

        return PurchaseResource::collection($purchases);
    }
}
