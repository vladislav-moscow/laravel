<?php

namespace App\Services;

use App\Contracts\Social;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialContract;


class SocialService implements Social
{

    /**
     * @throws Exception
     */
    public function authUser(SocialContract $socialUser): string
    {
        $user = User::where('email', $socialUser->getEmail())->first();
        if ($user) {
            $user->name = $socialUser->getName();
            $user->avatar = $socialUser->getAvatar();

            if($user->save()) {
                Auth::loginUsingId($user->id);
                return  route('account.index');
            }

            throw new Exception("Что-то пошло не так!");

        }else {
            return  route('register');
        }
    }
}
