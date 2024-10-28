<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;

class ProfileController extends Controller
{
    public function show(User $user) {
        return view('profiles.show', compact('user'));
    }

    public function edit(User $user) {

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user) {

        if (password_verify(request('currPassword'), $user->password)) {
            $attr = request()->validate([
                'username' => ['string', 'required', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)],
                'name' => ['string', 'required', 'max:255'],
                'email' => ['string', 'required', 'max:255', 'email', Rule::unique('users')->ignore($user)],
                'avatar' => ['mimes:jpeg,jpg,png,gif'],
            ]);
    
            if (request('avatar')) {
                $attr['avatar'] = request('avatar')->store('avatars');
            }

            if (request('password')) {
                $newPassword = request()->validate([
                    'password' => ['string', 'min:8', 'max:255', 'confirmed']
                ]);

                $attr['password'] = $newPassword['password'];
            }
    
            $user->update($attr);
    
            return redirect('/profile/'.$user->username);
        }

        return redirect('/profile/'.$user->username.'/edit')->withErrors(['currPassword' => 'Wrong password!']);
    }

}
