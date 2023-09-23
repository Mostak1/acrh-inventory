<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }
    public function index()
    {
       $user= User::get();
       return response()->json([
        'result' => $user,
        "responseMessage"=>"Data Don't Insert.Try again Please"
    ]);
    }

   
    public function create()
    {
      
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $result = $this->userService->createUser($request, $data);
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

    public function show(string $id)
    {

    }
    public function edit(string $id)
    {
       
    }
    public function update(Request $request, string $id)
    {
        
    }
    public function destroy(string $id)
    {
        
    }
}
