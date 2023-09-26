<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{

    public function index()
    {
        $dataAll= UserRole::get();
           return response()->json([
            'data' => $dataAll,
           
        ]);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $data  = [
            'user_id'=>$request->user_id,
            'role_id'=>$request->role_id,

        ];
        $roleu = UserRole::create($data);
        
        return response()->json([
         'roleu' => $roleu,
         'success' =>'Create Successfully'
        
     ]);
    }

    public function show(UserRole $userRole)
    {
        //
    }
    public function edit(UserRole $userRole)
    {
        //
    }

    public function update(Request $request, UserRole $userRole)
    {
        $data  = [
            'user_id'=>$request->user_id,
            'role_id'=>$request->role_id,
        ];
        $roleu = $userRole->update($data);
        return response()->json([
            'roleu' => $roleu,
            'success' =>'Update Successfully'
           
        ]);
    }

    public function destroy(UserRole $userRole)
    {
        if (UserRole::destroy($userRole->id)) {
            return response()->json([
                'info' =>  $userRole->id . ' Deleted!',
               
            ]);
        }
    }
}
