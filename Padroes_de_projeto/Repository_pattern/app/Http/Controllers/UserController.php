<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repository\Interfaces\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(): JsonResponse
    {
        $users = $this->userRepository->getAll();

        return response()->json(['user' => $users]);
    }
}
