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
                'profile_photo' => ['required', 'max:255', File::types(['png', 'jpg', 'svg', 'webp'])->max(2048)]
            ]);
            if (request()->hasFile('profile_photo')) {
                $file = request()->file('profile_photo');
                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('photos', $filename, 'public');
                $data['profile_photo'] = '/storage/' . $filePath;
            }
            $user = Auth::user();
            $user_id = $user->id;
            User::where('id', $user_id)->update([
                'profile_photo' => $data['profile_photo']
            ]);
        } catch (Exception $e) {
            return back()->with('error', 'There was an error updating profile photo: ' . $e->getMessage());
        }
        return redirect()->route('profile')->with('success', 'Your profile photo has been update!');
    }
}
