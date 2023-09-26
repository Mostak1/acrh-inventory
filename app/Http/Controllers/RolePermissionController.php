<?php

namespace App\Http\Controllers;

use App\Models\RolePermission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    public function index()
    {
        $dataAll = RolePermission::get();
        return response()->json([
            'data' => $dataAll,

        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data  = [
            'permission_id' => $request->permission_id,
            'role_id' => $request->role_id,

        ];
        $rolep = RolePermission::create($data);

        return response()->json([
            'data' => $rolep,
            'success' => 'Create Successfully'
        ]);
    }

    public function show(RolePermission $rolePermission)
    {
     
    }

    public function edit(RolePermission $rolePermission)
    {
    
    }

    public function update(Request $request, RolePermission $rolePermission)
    {
        $data  = [
            'permission_id' => $request->permission_id,
            'role_id' => $request->role_id,

        ];
        $rolep = $rolePermission->update($data);

        return response()->json([
            'data' => $rolep,
            'success' => 'Update Successfully'

        ]);
    }

    public function destroy(RolePermission $rolePermission)
    {
        if (RolePermission::destroy($rolePermission->id)) {
            return response()->json([
                'info' => $rolePermission->id . ' deleted',
            ]);
        }
    }
}
