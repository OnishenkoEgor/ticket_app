<?php

namespace App\Listeners\User;

use App\Events\User\UserCreatedEvent;
use App\Services\KafkaService;
use App\Services\RabbitMQService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\App;

class UserCreatedListener implements ShouldQueue
{

    public function __construct(private readonly UserCreatedEvent $event)
    {
    }

    public function handle(): void
    {
        $rabbitMqService = App::make(RabbitMQService::class);
        $rabbitMqService->produce('users', $this->event->user->toArray());
    }
}
