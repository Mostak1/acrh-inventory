<?php 
namespace App\Repositories;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleRepository{
    public function createRole(Request $request)
    {
        $roleData  = [
            'role_name'=>$request->role_name,
            'is_active'=>false,

        ];
        $role = Role::create($roleData);
        return $role;
    }
    public function updateRole(Role $role,Request $request)
    {
        $roleData  = [
            'role_name'=>$request->role_name,
            'is_active'=>false,

        ];
        // dd($data);
        $role = $role->update($roleData);
        return $role;
    }
}