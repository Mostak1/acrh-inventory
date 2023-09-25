<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function createUserR(Request $request)
    {
       $request->validate([
            'first_name' => 'required|string|max:200',
            'last_name' => 'required|string|max:200',
            'email' => 'required|string|email|max:200|unique:users',
            'password' => 'required|string|integer|min:8',
            'phone_no' => 'required|regex:/^01[0-9]{9}$/',
        ]);

        $userData  = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password ?? 12341234),
            'phone_no' => $request->phone_no,
            'user_status' => 'Active',
            'is_active' => false,

        ];

        $user = User::create($userData);
        return $user;



    }
    public function updateUser(User $user, Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:200',
            'last_name' => 'required|string|max:200',
            'email' => 'required|string|email|max:200|unique:users',
            'password' => 'required|string|integer|min:8',
            'phone_no' => 'required|regex:/^01[0-9]{9}$/',
        ]);
        $userData  = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
            'phone_no' => $request->phone_no,
            'user_status' => $request->user_status,
            'is_active' => $request->is_active,

        ];
        // dd($data);
        $user = $user->update($userData);
        return $user;
    }
}
