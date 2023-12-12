<?php

namespace App\Listeners\User;

use App\Events\User\UserDeletedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserDeletedListener implements ShouldQueue
{
    public function __construct(private readonly UserDeletedEvent $event)
    {
    }

    public function handle(): void
    {
        dump($this->event);
    }
}
