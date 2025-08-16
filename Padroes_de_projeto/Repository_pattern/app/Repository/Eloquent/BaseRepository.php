<?php

namespace App\Repository\Eloquent;

use App\Repository\Interfaces\EloquenetRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquenetRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        $this->model->all();
    }

    public function create(array $data){}

    public function find(int $id){}

    public function update(int $id, array $data){}

    public function delete(int $id){}
    
}