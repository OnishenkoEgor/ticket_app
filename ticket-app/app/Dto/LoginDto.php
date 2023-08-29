<?php

namespace App\Dto;

use Spatie\DataTransferObject\DataTransferObject;

class LoginDto extends DataTransferObject
{
    public string $email;
    public string $password;
}
