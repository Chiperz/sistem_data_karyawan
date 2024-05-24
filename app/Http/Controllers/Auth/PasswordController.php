<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => 'required | current_password',
            'password' => 'required | confirmed'
        ]);

        if($request->password == $request->current_password){
            toastr()->error('The New Password Cannot Be The Same As The Old Password!');
            return back()->with('status', 'errors');
        }

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        toastr()->success('Password Has Been Changed!');

        return back()->with('status', 'password-updated');
    }
}
