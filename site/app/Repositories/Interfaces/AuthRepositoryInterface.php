<?php

namespace App\Repositories\Interfaces;

interface AuthRepositoryInterface
{
    public function userCreate($data);
    public function userLogin($data);
}
