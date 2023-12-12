<?php

namespace App\Listeners\User;

use App\Events\User\UserUpdatedEvent;
use App\Services\KafkaService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;

class UserUpdatedListener implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(private readonly UserUpdatedEvent $event)
    {
    }

    public function handle(): void
    {
        $kafkaService = App::make(KafkaService::class);
        $kafkaService->produce('users', $this->event->user->toArray());
    }
}
