<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Service\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service) 
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        $user = User::all();

        if($user->isEmpty()) {
            return response()->json(['message' => 'nao tem user']);
        }
        return response()->json([
            'user' => $user
        ]);
    }

    public function store( Request $request): JsonResponse
    {
        $data = $request->only(['name', 'email', 'password']);

        $user = $this->service->create($data);

        return response()->json([
            "data" => 'usuario creado',             
            "user" => $user             
            ],201);
    }
}
