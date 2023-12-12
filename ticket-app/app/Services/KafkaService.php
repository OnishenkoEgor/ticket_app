<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Message\Message;

class KafkaService
{
    public function produce(string $topic, array $data)
    {
        try {
            Kafka::publishOn($topic)->withMessage(new Message(body: ['data' => $data], key: 'USER_UPDATED_EVENT'))->send();
        } catch (\Throwable $exception) {
            Log::error($exception->getMessage());
        }
    }
}
