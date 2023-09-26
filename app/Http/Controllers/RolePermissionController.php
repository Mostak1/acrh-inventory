<?php

namespace App\Http\Controllers;

use App\Models\RolePermission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataAll= RolePermission::get();
           return response()->json([
            'data' => $dataAll,
           
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data  = [
            'permission_id'=>$request->permission_id,
            'role_id'=>$request->role_id,

        ];
        $rolep = RolePermission::create($data);
        
        return response()->json([
         'data' => $rolep,
         'success' =>'Create Successfully'
        
     ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(RolePermission $rolePermission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RolePermission $rolePermission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RolePermission $rolePermission)
    {
        $data  = [
            'permission_id'=>$request->permission_id,
            'role_id'=>$request->role_id,

        ];
        $rolep = $rolePermission->update($data);
        
        return response()->json([
         'data' => $rolep,
         'success' =>'Update Successfully'
        
     ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RolePermission $rolePermission)
    {
        if(RolePermission::destroy($rolePermission->id)){
            return response()->json([
                'info' =>$rolePermission->id . ' deleted',
            ]);
        }
    }
}
