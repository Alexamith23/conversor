<?php

namespace App\Http\Controllers;

use App\Models\Descarga;
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
        $users_descargas = \DB::select('select * from descargas where user_id = '.\Auth::user()->id, [1]);
    
        if (!empty($users_descargas)) {
            return view('descargas', ["procesos"=>$users_descargas]);
        }else{
            return view('descargas', ["Vacio"=>"Todavía no tienes descargas procesadas"]);
        }
    }
    public function delete($id){
        $tarea = Descarga::find($id);
        $tarea->delete();
        return redirect('/descargas');
    }

    public function convertir()
    {

        $descarga = [
        "queue" => request()->cola,
        "user_id" => \Auth::user()->id,
        "link" => request()->link,
        "format" => request()->formato];
        // $this->producer(json_encode($descarga));
        Descarga::create($descarga);
        return $this->descargas();
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

