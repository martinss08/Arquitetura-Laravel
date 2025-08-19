<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use stdClass;

class UserService 
{
    public function __construct(protected User $model)
    {}

    public function index()
    {
        return $this->model->all();
    }

    public function create(array $data): stdClass
    {
        $user = $this->model->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return $user;
    }
}