<?php 
namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRepository{
    public function createUser(Request $request)
    {
        $userData  = [
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password ?? 12341234),
            'phone_no'=>$request->phone_no,
            'user_status'=>'Active',
            'is_active'=>false,

        ];
        // dd($data);
        $user = User::create($userData);
        return $user;
    }
    public function updateUser(User $user,Request $request)
    {
        $userData  = [
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'password'=>$request->password,
            'phone_no'=>$request->phone_no,
            'user_status'=>$request->user_status,
            'is_active'=>$request->is_active,

        ];
        // dd($data);
        $user = $user->update($userData);
        return $user;
    }
}