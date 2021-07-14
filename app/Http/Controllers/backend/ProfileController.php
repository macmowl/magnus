<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Image;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function showProfile() {
        $user = Auth::user();
        return view('backend.users.profile', compact('user'));
    }

    public function editProfile() {
        $user = Auth::user();
        return view('backend.users.edit-profile', compact('user'));
    }

    public function updateProfile(Request $request) {
        $user = Auth::user();
        $user->name = $request->name;
        $user->role = $request->role;
        $user->gender = $request->gender;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->status = $request->status;

        if ($request->profile_photo_path) {
            $avatar = $request->file('profile_photo_path');
            $name_gen = hexdec(uniqid()) . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('storage/profile-photos/' . $name_gen);
            $user->profile_photo_path = 'profile-photos/' . $name_gen;
        }
        $user->save();

        $notification = array(
            'message' => 'Profile successfully updated',
            'alert-type' => 'success'
        );
        return Redirect()->route('profile.view')->with($notification);
        // ceci est un commentaire
    }

    public function updatePassword(Request $request) {
        $validation = $request->validate([
            "current_password" => "required",
            "password" => "required|confirmed"
        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->current_password, $hashedPassword)) {
            $user = Auth::user();
            $user->password = Hash::make($request->password);
            $user->save();

            $notification = array(
                'message' => 'Password successfully updated',
                'alert-type' => 'success',
            );

            return redirect()->route('profile.view')->with($notification);
        } else {
            return redirect()->back();
        }
    }
}
