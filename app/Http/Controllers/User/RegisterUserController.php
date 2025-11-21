<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterUserController extends Controller
{
    public function showSignup()
    {
        return view('user.signup');
    }
    public function storeSignUp(Request $request)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'min:6'],
            'email' => ['required', 'unique:users,email', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6']
        ]);
        // Create a User
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        // Send verification email
    $user->sendEmailVerificationNotification();

      // Redirect to verify notice page
    return redirect()->route('verification.notice');

        // Auth::login($user);
        // return redirect()->route('user.dashboard');
    }
}
