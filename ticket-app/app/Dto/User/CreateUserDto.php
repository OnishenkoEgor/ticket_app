<?php

namespace App\Dto\User;

use Spatie\DataTransferObject\DataTransferObject;

class CreateUserDto extends DataTransferObject
{
    public string $name;
    public string $email;
}
