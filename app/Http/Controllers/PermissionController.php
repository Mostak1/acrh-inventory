<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function index()
    {
        $dataAll= Permission::get();
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
            'permission_id'=>$request->permission_id,
            'role_id'=>$request->role_id,

        ];
        $rolep = Permission::create($data);
        
        return response()->json([
         'data' => $rolep,
         'success' =>'Create Successfully'
        
     ]);
    }

    public function show(Permission $permission)
    {
        return response()->json([
         'data' => $permission,
        
     ]);
    }

    public function edit(Permission $permission)
    {
       
    }

    public function update(Request $request, Permission $permission)
    {
        $data  = [
            'permission_id'=>$request->permission_id,
            'role_id'=>$request->role_id,

        ];
        $rolep = $permission->update($data);
        
        return response()->json([
         'data' => $rolep,
         'success' =>'Update Successfully'
        
     ]);
    }

    public function destroy(Permission $permission)
    {
        if (Permission::destroy($permission->id)) {
            return response()->json([
                'info' =>  $permission->id . ' Deleted!',
               
            ]);
        }
    }
}
