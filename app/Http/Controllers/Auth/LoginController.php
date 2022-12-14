<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect user to provider login
     *
     * @param string $driver
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider(string $driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    /**
     * Handle provider callback. Login / register user
     *
     * @param $driver
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleProviderCallback($driver)
    {
        try {
            $providerUser = Socialite::driver($driver)->user();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        if ($user = User::where('email', $providerUser->getEmail())->first()) {
            auth()->login($user, true);

            return redirect($this->redirectPath());
        }

        $user = new User;
        $user->provider_name = $driver;
        $user->provider_id = $providerUser->getId();
        $user->name = $providerUser->getName();
        $user->email = $providerUser->getEmail();
        $user->email_verified_at = now();
        $user->save();

        auth()->login($user, true);

        return redirect($this->redirectPath());
    }
}
