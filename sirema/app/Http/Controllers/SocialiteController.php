<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProvideCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            Log::error('Social Login error: ' . $e->getMessage());

            return redirect('/login')->withErrors('Error during social login: ' . $e->getMessage());
        }
        // find or create user and send params user get from socialite and provider
        $authUser = $this->findOrCreateUser($user, $provider);

        // login user
        Auth::login($authUser, true);

        if(Auth::user()->role === 'user'){
            return redirect()->route('user')->with('success','halo User, Anda berhasil login');
        }else if(Auth::user()->role === 'admin'){
            return redirect()->route('admin')->with('success','Berhasil login');
        }else if(Auth::user()->role === 'personil'){
            return redirect()->route('personil')->with('success','Berhasil login');
        }
    }

    public function findOrCreateUser($socialUser, $provider)
    {
        $str = Str::random(100);
        // Get Social Account
        $socialAccount = SocialAccount::where('provider_id', $socialUser->getId())
            ->where('provider_name', $provider)
            ->first();

        // Jika sudah ada
        if ($socialAccount) {
            // return user
            return $socialAccount->user;

            // Jika belum ada
        } else {
            // User berdasarkan email
            $user = User::where('email', $socialUser->getEmail())->first();

            // Jika Tidak ada user
            if (!$user) {
                // Create user baru
                $user = User::create([
                    'name'  => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'role'       => 'user',
                    'verify_key' => $str,
                ]);
            }

            // Buat Social Account baru
            $user->socialAccounts()->create([
                'provider_id'   => $socialUser->getId(),
                'provider_name' => $provider
            ]);

            // return user
            return $user;
        }
    }
}
