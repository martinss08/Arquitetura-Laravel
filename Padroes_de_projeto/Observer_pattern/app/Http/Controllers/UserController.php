<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct(protected User $model) {}

    public function index(): JsonResponse
    {
        $users = $this->model->all();

        if ($users->isEmpty()) {
            return response()->json([
                'message' => 'Nenhum usuário encontrado'
            ], 404);
        }

        return response()->json([
            'message' => 'Lista de usuários',
            'data' => $users
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Erro de validação',
                'errors'  => $validator->errors()
            ], 422);
        }

        $user = $this->model->create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'Usuário criado com sucesso',
            'data'    => $user
        ], 201);
    }


    public function destroy($id): JsonResponse
    {
        $user = $this->model->find($id);

        if (!$user) {
            return response()->json([
                'message' => 'Usuário não encontrado'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'message' => 'Usuário deletado com sucesso'
        ]);
    }
}
