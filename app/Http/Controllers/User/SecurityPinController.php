<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SecurityPinController extends Controller
{
    public function showSecurityPin()
    {
        $user = Auth::user();
        return view('auth.security_pin', compact('user'));
    }
    public function storeSecurityPin(Request $request)
    {
        // Prefer the joined hidden `pin` (set by JS). Fall back to individual inputs.
        if ($request->filled('pin')) {
            $request->validate([
                'pin' => ['string', 'size:4'],
            ]);

            $pin = $request->input('pin');
        } else {
            $data = $request->validate([
                'number1' => ['required', 'digits:1'],
                'number2' => ['required', 'digits:1'],
                'number3' => ['required', 'digits:1'],
                'number4' => ['required', 'digits:1'],
            ]);

            // Combine digits
            $pin = $data['number1']
                . $data['number2']
                . $data['number3']
                . $data['number4'];
        }

        // Hash the PIN (VERY IMPORTANT)
        $hashedPin = Hash::make($pin);

        $user = Auth::user();

        // Use the correct database column `security_pin` (migration and factory use this name)
        $existingPin = $user->security_pin;

        if ($existingPin === null) {
            // Store the hashed PIN in the `security_pin` column
            $user->update([
                'security_pin' => $hashedPin,
            ]);

            return redirect()->route('user.dashboard')->with('success', 'PIN created successfully.');
        }

        // Compare the provided PIN with the stored hashed PIN
        if (Hash::check($pin, $existingPin)) {
            // ✅ Mark PIN as verified in session
            session(['pin_verified' => true]);
            return redirect()->route('user.dashboard')->with('success', 'PIN verified successfully.');
        }

        // PIN does not match
        return back()->with('error', 'The provided PIN does not match your existing security PIN.');
    }
}
