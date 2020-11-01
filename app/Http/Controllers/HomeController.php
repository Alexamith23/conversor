<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        
        $descarga = ["user_id" => \Auth::user()->id,
        "link" => request()->link,
        "format" => request()->formato,
        "queue" => request()->cola];
        $command = exec('php C:\xampp\htdocs\login\app\Http\Controllers\producer.php '. json_encode($descarga));
        return $command;
    }
}
