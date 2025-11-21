<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class sendEmailVerificationNotificationController extends Controller
{
    public function sendNotification()
    {
        return view('auth.notification');
    }
    public function verificationRequest(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->route('user.dashboard'); // after verification
    }
    public function linkConfirm(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }
}
