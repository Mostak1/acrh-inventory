<?php
namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;


class UserService
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }
    public function createUser($data)
    {
        return $this->userRepository->createUser($data);
    }

    public function updateUser(User $user, Request $request)
    {
        
        return $this->userRepository->updateUser($user, $request);
    }

    public function deleteCategory(User $user)
    {
        
    }
}