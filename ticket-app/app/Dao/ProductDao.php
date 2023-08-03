<?php

namespace App\Dao;

use App\Dto\AbstractDto;
use Illuminate\Database\Eloquent\Model;

class ProductDao implements DaoInterface
{

    public function get(int $id): Model
    {
        // TODO: Implement get() method.
    }

    public function create(AbstractDto $dto): void
    {
        // TODO: Implement create() method.
    }

    public function update(AbstractDto $dto): Model
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }
}
