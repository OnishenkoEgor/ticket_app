<?php

namespace App\Dao;

use App\Models\User;
use Illuminate\Support\Collection;

class UserDao
{
    public function getAll(): Collection
    {
        return User::all();
    }
}
