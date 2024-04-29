<?php

namespace App\Http\Controllers;

use App\Http\Resources\RewardResource;
use App\Models\LoyaltyWallet;
use App\Models\Reward;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Response;

class RewardController extends Controller
{

    public function __invoke(): AnonymousResourceCollection
    {

        $rewards = Reward::query()
            ->where('is_available', true)
            ->paginate();

        return RewardResource::collection($rewards);

    }
}
