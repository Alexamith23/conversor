<?php
require_once 'C:\xampp\htdocs\login\vendor\autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$msg = new AMQPMessage($argv);
$array = $argv[1];
// $cola = $array[7];
$channel->queue_declare($cola, false, false, false, false);
$channel->basic_publish($msg, '', $cola);
$channel->close();
$connection->close();
