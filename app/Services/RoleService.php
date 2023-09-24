<?php
namespace App\Services;

use App\Models\Role;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;

class RoleService {
    protected $roleRepository;
    public function __construct(RoleRepository $roleRepository){
        $this->roleRepository = $roleRepository;
    }
    public function createRole($data)
    {
        return $this->roleRepository->createRole($data);
    }

    public function updaterole(Role $role, Request $request)
    {
        
        return $this->roleRepository->updateRole($role, $request);
    }

    public function deleteCategory(Role $role)
    {
        
    }
}