<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('password.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $currentPassword = auth()->user()->password;

        if (Hash::check($request->old_password, $currentPassword)) {
            if (Hash::check($request->password, $currentPassword)) {
                return back()->withErrors(['password' => 'New Password must be different from old password']);
            } else {
                auth()->user()->update([
                    'password' => Hash::make($request->password),
                ]);
                return back()->with('success', 'Password changed successfully');
            }
        } else {
            return back()->withErrors(['old_password' => 'Old password is incorrect']);
        }
    }
}
