<?php

namespace App\Http\Controllers;

use App\Http\Requests\RewardRequest;
use App\Http\Resources\RedeemResource;
use App\Services\RedeemService;
use Illuminate\Http\JsonResponse;

class RedeemController extends Controller
{
    protected $redeemService;

    public function __construct(RedeemService $redeemService)
    {
        $this->redeemService = $redeemService;
    }

    public function __invoke(RewardRequest $request): RedeemResource|JsonResponse
    {
        $userId = $request->user()->id;
        $rewardId = $request->reward_id;

        $result = $this->redeemService->redeemReward($userId, $rewardId);

        if (isset($result['error'])) {
            return response()->json(['message' => $result['error']], $result['status']);
        }

        $redeemRecord = $result['redeemRecord']->load('user', 'reward', 'transaction');
        return new RedeemResource($redeemRecord);
    }
}
