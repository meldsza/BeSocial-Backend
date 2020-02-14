<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'phone' => ['nullable', 'string', 'min:10'],
        ]);
        $user->update($data);
        return (['message' => 'Successfully updated.']);
    }
}
