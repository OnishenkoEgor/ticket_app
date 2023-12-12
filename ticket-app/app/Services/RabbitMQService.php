<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQService
{
    public function __construct()
    {
    }

    public function produce(string $queue, array $data): void
    {
        try {
            $connection = new AMQPStreamConnection('rabbitmq', 5672, 'rmuser', 'rmpassword');
            $channel = $connection->channel();

            $channel->queue_declare($queue, false, false, false, false);
            $channel->basic_publish(new AMQPMessage(json_encode($data)), '', $queue);

            $channel->close();
            $connection->close();
        } catch (\Throwable $exception) {
            Log::error($exception->getMessage());
        }
    }
}
