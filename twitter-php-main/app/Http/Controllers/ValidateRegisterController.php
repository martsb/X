<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ValidateRegisterController extends Controller
{
    public function validateRegister(Request $request) {

        $fields = $request->validate([
            'username' => ['required', Rule::unique('users', 'username')],
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => 'required',
            'passwordRepeat' => 'required'
        ]);

        $fields['password'] = bcrypt($fields['password']);
        $newUser = User::create($fields);
        auth()->login($newUser);
        return redirect('/');
    }
}
