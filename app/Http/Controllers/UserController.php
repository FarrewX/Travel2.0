<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class UserController extends Controller
{
    public function store(Request $request)
    {
       // ตรวจสอบข้อมูลที่ส่งมา Login : email, password, device_name
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return $user->createToken($request->device_name)->plainTextToken;
}

    public function destroy(User $user){
        return $user->token()->delete();
    }
}
