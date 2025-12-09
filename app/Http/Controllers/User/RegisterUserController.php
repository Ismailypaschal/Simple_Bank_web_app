<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RegisterUserController extends Controller
{
    public function showSignup()
    {
        return view('user.signup');
    }
    public function storeSignUp(Request $request)
    {
        Log::info('User sign up details', $request->all());
        $data = request()->validate([
            'first_name' => ['required', 'string', 'min:2'],
            'last_name' => ['required', 'string', 'min:2'],
            'email' => ['required', 'unique:users,email', 'string', 'email', 'max:255'],
            'phone' => ['required', 'unique:users,phone', 'regex:/^\d{7,14}$/'],
            // 'phone' => ['required', 'regex:/^\+?[\d\s\-\(\)]{7,20}$/'],
            'dob' => ['required', 'date'],
            'occupation' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'marital_status' => ['required', 'string'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'postal_code' => ['required', 'numeric'],
            'password' => ['required', 'string', 'min:6']
        ]);
        // Create a User
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['dob'],
            'dob' => $data['phone'],
            'occupation' => $data['occupation'],
            'gender' => $data['gender'],
            'marital_status' => $data['marital_status'],
            'address' => $data['address'],
            'city' => $data['city'],
            'postal_code' => $data['postal_code'],
            'password' => bcrypt($data['password'])
        ]);

        // Generate account number
        $account_number = rand(1000000000, 9999999999);
        // Create User Account details
        $account = Account::create([
            'user_id' => $user->id,
            'account_number' => $account_number,
            'currency' => 'NGN' ?? 'null',
        ]);
        // Send verification email
        $user->sendEmailVerificationNotification();

        // Redirect to verify notice page
        return redirect()->route('verification.notice');

        // Auth::login($user);
        // return redirect()->route('user.dashboard');
    }
}
