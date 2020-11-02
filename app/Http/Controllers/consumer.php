<?php

require_once 'C:\xampp\htdocs\login\vendor\autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('1', false, false, false, false);

echo " [*] Waiting for messages. To exit press CTRL+C\n";

$callback = function ($msg) {
    $descarga = json_decode($msg->body);
    echo ' [x] Received ', $msg->body, "\n";
    echo $descarga->link;
};

$channel->basic_consume('1', '', false, true, false, false, $callback);

while ($channel->is_consuming()) {
    $channel->wait();
}

$channel->close();
$connection->close();
?>
