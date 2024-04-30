<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;

class ProfileController extends Controller
{
    public function __invoke(): UserResource
    {

        $user = auth()->user();
        $user->load('addresses', 'purchases', 'loyaltyWallet');
        return new UserResource($user);

    }
}
