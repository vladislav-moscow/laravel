<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Contracts\Social;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    /**
     * @param string $network
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|RedirectResponse
     */
    public function index(string $network): \Symfony\Component\HttpFoundation\RedirectResponse|RedirectResponse
    {
        return Socialite::driver($network)->redirect();
    }

    /**
     * @param string $network
     * @param Social $social
     * @return Redirector|Application|RedirectResponse
     */
    public function callback(string $network, Social $social): Redirector|Application|RedirectResponse
    {
        return redirect($social->authUser(
            Socialite::driver($network)->user()
        ));
    }
}
