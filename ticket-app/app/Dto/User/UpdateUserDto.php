<?php

namespace App\Dto\User;

use Spatie\DataTransferObject\DataTransferObject;

class UpdateUserDto extends DataTransferObject
{
    public string $name;
}
