<?php

namespace App\Dao;

use Illuminate\Database\Eloquent\Model;
use Spatie\DataTransferObject\DataTransferObject;

interface DaoInterface
{
    //Basic CRUD interface
    public function get(int $id): Model;

    public function create(DataTransferObject $dto): void;

    public function update(DataTransferObject $dto): Model;

    public function delete(int $id): void;
}
