<?php

namespace App\Http\Controllers;

use App\Http\Resources\PurchaseResource;
use App\Models\Purchase;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

    public function __invoke(Request $request): AnonymousResourceCollection
    {
        $userId = $request->user()->id;
        $purchases = Purchase::with(['products', 'address'])
            ->where('user_id', $userId)
            ->get();

        return PurchaseResource::collection($purchases);
    }
}
