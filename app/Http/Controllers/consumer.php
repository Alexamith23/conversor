<?php

require_once 'C:\xampp\htdocs\login\vendor\autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('1', false, false, false, false);

echo " [*] Waiting for messages. To exit press CTRL+C\n";

$callback = function ($msg) {
    $cuerpo = $msg->body;
    $cuerpo2 = "";
    for ($i=0; $i < strlen($cuerpo); $i++) { 
        if($cuerpo[$i] != '\\'){
            $cuerpo2 = $cuerpo2.$cuerpo[$i];
        }
    }
    echo ' [x] Received ', $cuerpo2, "\n";
    shell_exec("sh VideoDownloaderCLI_test.sh '{id: 1, user_id: 2, link: https://www.youtube.com/watch?v=bRNfIcUhllk, format: auto}'");    
};

$channel->basic_consume('1', '', false, true, false, false, $callback);

while ($channel->is_consuming()) {
    $channel->wait();
}

$channel->close();
$connection->close();
?>
