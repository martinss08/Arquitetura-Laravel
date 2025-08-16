<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Interfaces\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        Parent::__construct($model);
    }

    public function getAll()
    {
        return $this->model->all();
    }
}