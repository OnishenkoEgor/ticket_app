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

    public function get(int $id): User
    {
        return User::findOrFail($id);
    }

    public function create(array $data): bool
    {
        return User::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return User::where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return User::where('id', $id)->delete();
    }
}
