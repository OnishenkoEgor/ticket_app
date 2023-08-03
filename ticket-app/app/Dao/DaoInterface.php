<?php

namespace App\Dao;

use App\Dto\AbstractDto;
use Illuminate\Database\Eloquent\Model;

interface DaoInterface
{
    public function get(int $id): Model;

    public function create(AbstractDto $dto): void;

    public function update(AbstractDto $dto): Model;

    public function delete(int $id): void;
}
