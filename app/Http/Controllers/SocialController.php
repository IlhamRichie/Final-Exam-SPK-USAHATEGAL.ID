<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $user = Socialite::driver('google')->user();

        // Assuming you have logic to find or create user based on Google email or any other identifier
        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            // Create a new user if not exists
            $newUser = User::create([
                'nama_user' => $user->getName(),
                'email' => $user->getEmail(),
                // You may need to handle other fields as per your application's requirements
            ]);

            Auth::login($newUser);
        }

        return redirect()->route('kriteria.index'); // Redirect to kriteria route after login
    }
}
