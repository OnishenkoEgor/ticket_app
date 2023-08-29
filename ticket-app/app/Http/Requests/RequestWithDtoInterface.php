<?php

namespace App\Http\Requests;

use Spatie\DataTransferObject\DataTransferObject;

interface RequestWithDtoInterface
{
    public function getDto(): DataTransferObject;
}
