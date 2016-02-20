<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class SocialAuthController extends Controller
{
    protected $redirectPath = '/consejo';

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return Response
     */
    public function redirectToProvider(Request $request)
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google..
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request)
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::firstOrCreate([
            'email' => $googleUser->getEmail(),
            'name' => $googleUser->getName()
        ]);

        Auth::login($user);
        $request->session()->put('user', Auth::user());
        return redirect('/consejo');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->put('user', Auth::user());
        return redirect('/consejo');
    }
}
