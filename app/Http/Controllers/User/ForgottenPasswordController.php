<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\sendPasswordResetNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgottenPasswordController extends Controller
{
    public function showForm()
    {
        return view('auth.forgotten_password');
    }
    public function sendResetLink(Request $request)
    {
        // Validate the email
        $data = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        // Check if user exists
        if (!\App\Models\User::where('email', $data['email'])->exists()) {
            return redirect()->back()->withErrors(['email' => 'The provided credentials do not match our records.']);
        }

        $token = Str::random(64);
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $data['email']],
            ['token' => bcrypt($token), 'created_at' => now()]
        );

        Mail::send('emails.password_reset', ['token' => $token], function ($message) use ($data) {
            $message->to($data['email']);
            $message->subject('Password Reset Request');
        });

        // For demonstration, we'll just redirect to notification page.
        return redirect()->route('notification');
    }
    public function confirmLink()
    {
        return view('auth.reset_password_notification');
    }
}
