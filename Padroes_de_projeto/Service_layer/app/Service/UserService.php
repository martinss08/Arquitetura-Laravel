<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use stdClass;

class UserService 
{
    public function __construct(protected User $model)
    {}

    // public function index()
    // {
    //     $user = $this->model->all();

    //     return $user;
    // }

    public function create(array $data): stdClass
    {
        dd("oi");

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return $user;
    }
}