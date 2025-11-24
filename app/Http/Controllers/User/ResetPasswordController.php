<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;


class ResetPasswordController extends Controller
{
    public function showResetPassword($token)
    {
        return view('auth.reset_password', ['token' => $token]);
    }
    public function storeResetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $record = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        if (!$record || !Hash::check($request->token, $record->token) || Carbon::parse($record->created_at)->addMinutes(60)->isPast()) {
            return back()->withErrors(['email' => 'This password reset token is invalid or has expired.']);
        }
        User::where('email', $request->email)
            ->update([
                'password' => Hash::make($request->password)
            ]);
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', 'Your Password has been reset!');
    }
    public function confirmLink()
    {
        return view('auth.reset_password_notification');
    }
}
