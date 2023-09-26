<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Controllers\Controller;
use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleService;
    public function __construct(RoleService $roleService){
        $this->roleService = $roleService;
    }
    public function index()
    {
        $role= Role::get();
       
           return response()->json([
            'role' => $role,
           
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
        $data = $request->all();
        $result = $this->roleService->createRole($request, $data);
    if ($result) {
        return response()->json([
            'result' => $result,
            "responseCode"=> "10000S",
            "responseMessage"=>"Operation went smoothly."
        ]);
    } else {
        return response()->json([
            "responseMessage"=>"Data Don't Insert.Try again Please"
        ]);
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
      
        return response()->json([
            'data'=> $role
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }
    
    public function destroy(Role $role)
    {
        if (Role::destroy($role->id)) {
            return response()->json([
                'info' =>  $role->id . ' Deleted!',
               
            ]);
        }
    }
}
