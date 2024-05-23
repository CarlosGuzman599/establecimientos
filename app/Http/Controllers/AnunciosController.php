<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Tiempos;
use App\Models\Anuncios;
use Illuminate\Http\Request;
use App\Models\Establecimiento;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AnunciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function anuncio_establecimiento_create($id)
    {
        $tiempos = Tiempos::all();
        $establecimiento = Establecimiento::find($id);
        return view('anuncios.anuncio_establecimiento_create', compact('tiempos', 'establecimiento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAnunciosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->establecimientos_id){
            $request->validate([
                'titulo' => 'required|max:25',
                'img' => 'required|image|max:2048',
                'descripcion' => 'required|max:255',
                'tiempos_id' => 'required',
            ]);

            if(isset($request['img'])){
                $url_img = $request->file('img')->store('public/anuncios');
                $url = Storage::url($url_img);
                DB::table('anuncios')->insert([
                    'establecimientos_id' => $request['establecimientos_id'],
                    'localidades_id' => $request['localidades_id'],
                    'users_id' => $request['users_id'],
                    'titulo' => $request['titulo'],
                    'categorias_id' => $request['categorias_id'],
                    'img' => $url,
                    'descripcion' => $request['descripcion'],
                    'tiempos_id' => $request['tiempos_id'],
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now()
                ]); 
            }else{
                Anuncios::create($request->all());
            }
            return redirect()->route('establecimiento.show', $request['establecimientos_id']);
        }else{
            return 'usuario'; 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anuncios  $anuncios
     * @return \Illuminate\Http\Response
     */
    public function show(Anuncios $anuncios)
    {
        $response['titulo'] = $anuncios->titulo;
        $response['establecimiento_nombre'] = $anuncios->establecimiento['nombre'];
        $response['establecimiento_localidad'] = $anuncios->establecimiento['localidad']->nombre;
        $response['img'] = $anuncios->img;
        $response['delivery'] = $anuncios->establecimiento['delivery'];
        $response['descripcion'] = $anuncios->descripcion;
        $response['telefono'] = "protection";
        if($anuncios->establecimiento['protection'] == 1 && !Auth::user() == null){
            $response['telefono'] = $anuncios->establecimiento['telefono'];
        }elseif($anuncios->establecimiento['protection'] == 0){
            $response['telefono'] = $anuncios->establecimiento['telefono'];
        }

        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anuncios  $anuncios
     * @return \Illuminate\Http\Response
     */
    public function edit(Anuncios $anuncio)
    {

        if(!(Auth::user()->id == $anuncio->users_id)){
            abort(404);
        }

        $tiempos = Tiempos::all();
        $establecimiento = Establecimiento::find($anuncio->establecimientos_id);
        return view('anuncios.anuncio_establecimiento_edit', compact('tiempos', 'establecimiento', 'anuncio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnunciosRequest  $request
     * @param  \App\Models\Anuncios  $anuncios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anuncios $anuncios)
    {
        $anuncio = Anuncios::find($request->id);

        if(!(Auth::user()->id == $anuncio->users_id)){
            abort(404);
        }

        if(! ($request->titulo == $anuncios->titulo)){
            $request->validate(['titulo' => 'required|max:25']);
        }

        $request->validate([
            'titulo' => 'required|max:25',
            'descripcion' => 'required|max:255',
            'tiempos_id' => 'required',
        ]);

        if(isset($request['img'])){
            $url_img = $request->file('img')->store('public/anuncios');
            $url = Storage::url($url_img);
            if(!$anuncio->img==null){
                unlink(str_replace('/storage', 'storage', $anuncio->img));
            }
            $anuncio->img = $url;
        }

        $anuncio->titulo = $request['titulo'];
        $anuncio->descripcion = $request['descripcion'];
        $anuncio->tiempos_id = $request['tiempos_id'];
        $anuncio->updated_at = Carbon::now();
        
        $anuncio->save();
        return redirect()->route('establecimiento.show', $request['establecimientos_id']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anuncios  $anuncios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anuncios $anuncio)
    {
        if(!(Auth::user()->id == $anuncio->users_id)){
            abort(404);
        }
        
        try{
            $anuncio->delete();
            if(!$anuncio->img==null){
                unlink(str_replace('/storage', 'storage', $anuncio->img));
            }
            return response()->json(['status'=>200] , 200);
        }catch(Exception $e){
            //return response()->json(['Error!'=>'ErrorToShow  -> '.$e->getMessage()] , 500);
            return $e->getMessage();
        }
    }
}
