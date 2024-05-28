<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidateLoginController extends Controller
{
    public function validateLogin(Request $request) {
        $fields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt(['email' => $fields['email'], 'password' => $fields['password']])){
            $request->session()->regenerate();
        }
        else{
            return redirect('/login');
        }

        return redirect('/');
    }
}
