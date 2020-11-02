<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

require_once 'C:\xampp\htdocs\login\vendor\autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home()
    {
        return view('inicio');
    }
    public function descargas()
    {
        return view('descargas');
    }

    public function convertir()
    {

        $descarga = [
        "queue" => request()->cola,
        "user_id" => \Auth::user()->id,
        "link" => request()->link,
        "format" => request()->formato];
        $this->producer(json_encode($descarga));
        return view('home');
    }

    function producer($descarga)
    {
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();
        $msg = new AMQPMessage($descarga);
        $channel->queue_declare('1', false, false, false, false);
        $channel->basic_publish($msg, '', '1');
        $channel->close();
        $connection->close();
    }
}

