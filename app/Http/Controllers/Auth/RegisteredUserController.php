<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => ['required', 'string', 'max:255', 'unique:users,nik'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['required', 'numeric', 'unique:users,phone'],
            'whatsapp' => ['required', 'numeric', 'unique:users,whatsapp'],
            'address' => ['required'],
            'gender' => ['required'],
            'avatar' => ['required', 'image', 'max:2028'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($request->avatar) {
            $avatar = $request->avatar->store('avatars');
        } else {
            $avatar = $request->data_avatar;
        }

        $user = User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'whatsapp' => $request->whatsapp,
            'gender' => $request->gender,
            'address' => $request->address,
            'company' => $request->company,
            'avatar' => $avatar,
            'role' => 3,
            // 'password' => Hash::make($request->password),
            'password' => \bcrypt($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
