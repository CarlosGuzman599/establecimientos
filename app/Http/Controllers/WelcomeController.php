<?php

namespace App\Http\Controllers;

use App\Models\Anuncios;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
        //$this->middleware('auth');
    //}

    /**
     * Show the Welcome dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        $anuncio_near = [];
        $location = 1;
        if(Auth::user()){
            $location = Auth::user()->localidad_users_id;
        }

        $order_show = array(1, 2, 3, 4, 5, 6);

        switch ($location) {
            case 2:
                $order_show = array(2, 1, 3, 4, 5, 6);
                break;
            case 3:
                $order_show = array(3, 1, 2, 4, 5, 6);
                break;
            case 4:
                $order_show = array(4, 2, 1, 3, 5, 6);
                break;
            case 5:
                $order_show = array(5, 6, 2, 4, 1, 3);
                break;
            case 6:
                $order_show = array(6, 5, 2, 4, 3, 1);
                break;
        }

        foreach($order_show as $to_show){
            $anuncios = Anuncios::where('localidades_id', $to_show)->get();
            foreach($anuncios as $anuncio){
                array_push($anuncio_near, $anuncio);
            }
        }

        return view('welcome', compact('anuncio_near'));
    }
}
