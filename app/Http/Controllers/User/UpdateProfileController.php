<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\File;

class UpdateProfileController extends Controller
{
    public function updatePassword(Request $request)
    {
        try {
            $requestData = $request->validate([
                'old_password' => ['required'],
                'password' => ['required', 'min:6', 'confirmed']
            ]);
            $user = Auth::user();
            $user_id = $user->id;
            $oldPassword = $user->password;
            if (!Hash::check($requestData['old_password'], $oldPassword)) {
                return back()->withErrors(['old_password' => 'Old password is incorrect!']);
            }
            User::where('id', $user_id)->update([
                'password' => Hash::make($requestData['password'])
            ]);
        } catch (Exception $e) {
            return back()->with('error', 'There was an error updating password: ' . $e->getMessage());
        }

        return redirect()->route('profile')->with('success', 'Your Password has been update!');
    }
    public function updateProfilePhoto(Request $request)
    {
        try {
            $data = $request->validate([
                'profile_photo' => ['required', File::types(['png', 'jpg', 'svg', 'webp'])->max(2048)]
            ]);
            if ($request->hasFile('profile_photo')) {
                $file = $request->file('profile_photo');
                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('photos', $filename, 'public');
                $data['profile_photo'] = '/storage/' . $filePath;
            }
            $user = Auth::user();
            $user_id = $user->id;
            if (isset($data['profile_photo'])) {
                User::where('id', $user_id)->update([
                    'profile_photo' => $data['profile_photo']
                ]);
            }
        } catch (Exception $e) {
            return back()->with('error', 'There was an error updating profile photo: ' . $e->getMessage());
        }
        return redirect()->route('profile')->with('success', 'Your profile photo has been update!');
    }
    public function updatePin(Request $request)
    {
        try {
            $data = $request->validate([
                'old_pin' => ['required'],
                'security_pin' => ['required'],
                'confirm_pin' => ['required']
            ]);
            $user = Auth::user();
            $user_id = $user->id;
            $user_oldPIn = $user->security_pin;
            if (!Hash::check($data['old_pin'], $user_oldPIn)) {
                return back()->withErrors(['old_pin' => 'Old PIN is incorrect!']);
            }
            if ($data['security_pin'] !== $data['confirm_pin']) {
                return back()->withErrors(['confirm_pin' => 'New PIN and Confirm PIN do not match!']);
            }
            $user->update([
                'security_pin' => Hash::make($data['security_pin']),
            ]);
            return redirect()->route('profile')->with('success', 'Your security PIN has been updated!');
        } catch (Exception $e) {
            return back()->with('error', 'There was an error updating security PIN: ' . $e->getMessage());
        }
    }
}
