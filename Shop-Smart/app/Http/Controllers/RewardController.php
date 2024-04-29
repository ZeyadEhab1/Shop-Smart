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

        $points = auth()->user()->userBalance;
        $rewards = Reward::where('points', '<=', $points)->get();
        return RewardResource::collection($rewards);

    }
}
