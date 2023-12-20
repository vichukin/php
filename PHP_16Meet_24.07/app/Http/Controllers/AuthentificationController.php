<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AuthentificationController extends Controller
{
    public function getRegistration(Request $request): View
    {
        return view('registration');
    }
    public function postRegistration(Request $request): View
    {
        $validated = $request->validate([
            'login' => 'required|max:255',
            'email' => 'required|email',
            'age' => 'required|numeric|min:18',
            'password' => 'required|min:6',
            'confpassword' => 'required|same:password',
        ], [
            'login.required' => 'The login field is required',
            'login.max' => 'The login field must not exceed 255 characters',
            'email.required' => 'The email field is required',
            'email.email' => 'Invalid email format',
            'age.required' => 'The age field is required',
            'age.numeric' => 'The age field must be numeric',
            'age.min' => 'The age must be at least 18',
            'password.required' => 'The password field is required',
            'password.min' => 'The password must be at least :min characters',
            'confpassword.required' => 'The confirm password field is required',
            'confpassword.same' => 'The confirm password must match the password',
        ]);
        $input = $request->except('_token', 'confpassword',"password");
        return view("showUser", compact('input'));
    }

}
