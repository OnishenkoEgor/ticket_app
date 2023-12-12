<?php

namespace App\Events\User;

use App\Models\User;
use Illuminate\Foundation\Events\Dispatchable;

class UserUpdatedEvent
{
    use Dispatchable;

    public function __construct(public readonly User $user)
    {
    }
}
