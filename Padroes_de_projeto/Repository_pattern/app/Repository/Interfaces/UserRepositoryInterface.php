<?php

namespace App\Repository\Interfaces;

interface UserRepositoryInterface extends EloquenetRepositoryInterface
{
    public function getAll();
}