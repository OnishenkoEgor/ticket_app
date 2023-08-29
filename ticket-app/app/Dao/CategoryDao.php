<?php

namespace App\Dao;

use Illuminate\Database\Eloquent\Model;
use Spatie\DataTransferObject\DataTransferObject;

class CategoryDao implements DaoInterface
{
    public function get(int $id): Model
    {
        // TODO: Implement get() method.
    }

    public function create(DataTransferObject $dto): void
    {
        // TODO: Implement create() method.
    }

    public function update(DataTransferObject $dto): Model
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }
}
