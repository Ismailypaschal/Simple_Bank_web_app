<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;


class SessionUserController extends Controller
{
    public function showSignin()
    {
        return view('user.signin');
    }
    public function storeSignin(Request $request)
    {
        try {
            $data = request()->validate([
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:6']
            ]);
            if (!Auth::attempt($data)) {
                throw ValidationException::withMessages([
                    'email' => 'Sorry, incorrect email or password'
                ]);
            }
            return redirect()->route('user.dashboard');
        } catch (ValidationException $e) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
    }
     public function destroy(Request $request)
    {
        Auth::logout();
        // request()->session()->invalidate();
        // request()->session()->regenerateToken();
        return redirect()->route('login');
    }
    
}
