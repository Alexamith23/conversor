<?php
require_once 'C:\xampp\htdocs\login\vendor\autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('task_queue', false, false, false, false);

$msg = new AMQPMessage($argv);

$channel->basic_publish($msg, '', 'task_queue');

echo $argv[1];

$channel->close();
$connection->close();
?>
