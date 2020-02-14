<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Http\Request;

class APIRegisterController extends Controller
{

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  Request $request
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'min:10'],
        ]);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'points' => 0,
            'password' => Hash::make($data['password']),
        ]);
    }
}
