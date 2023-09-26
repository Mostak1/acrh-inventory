<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataAll= Permission::get();
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
        $rolep = Permission::create($data);
        
        return response()->json([
         'data' => $rolep,
         'success' =>'Create Successfully'
        
     ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
