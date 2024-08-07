<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Tiempos;
use App\Models\Anuncios;
use App\Models\State;
use Illuminate\Http\Request;
use App\Models\Establecimiento;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;



class AnunciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->tipo_users_id == 1){
            $anuncios = Anuncios::all();
            return view('admin.anuncios', compact('anuncios'));
        }else{
            abort(404);
        }
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
                'img' => 'required|image|max:5120',
                'descripcion' => 'required|max:255',
                'tiempos_id' => 'required',
            ]);

            if(isset($request['img'])){
                $request = app('request');
                $file = $request->file('img');
                Anuncios::create([
                    'establecimientos_id' => $request['establecimientos_id'],
                    'localidades_id' => $request['localidades_id'],
                    'users_id' => $request['users_id'],
                    'titulo' => $request['titulo'],
                    'categorias_id' => $request['categorias_id'],
                    'img' => '/storage/img/anuncios/'.((int)Anuncios::latest('id')->first()->id + 1).".".$file->getClientOriginalExtension(),
                    'descripcion' => $request['descripcion'],
                    'tiempos_id' => $request['tiempos_id'],
                ]);
                $newFileName = ((int)Anuncios::latest('id')->first()->id).".".$file->getClientOriginalExtension();
                $ruta = public_path('/storage/img/anuncios/'.$newFileName);
                Image::make($file->getRealPath())->fit(400, 400)->save($ruta,72);
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
    public function edit(Anuncios $anuncio){

        if(!(Auth::user()->id == $anuncio->users_id || Auth::user()->tipo_users_id == 1) || (Auth::user()->tipo_users_id != 1 && $anuncio->states_id != 1)){
            abort(404);
        }

        $tiempos = Tiempos::all();
        $states = State::all();
        $establecimiento = Establecimiento::find($anuncio->establecimientos_id);
        return view('anuncios.anuncio_establecimiento_edit', compact('tiempos', 'establecimiento', 'anuncio', 'states'));
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


        if( $request->titulo == null){
            $anuncio->states_id = 2;
            $anuncio->save();
            return response()->json(['status'=>200] , 200);
        }else{
            if(!(Auth::user()->id == $anuncio->users_id || Auth::user()->tipo_users_id == 1) || (Auth::user()->tipo_users_id != 1 && $anuncio->states_id != 1)){
                abort(404);
            }
    
            $validation = [];
    
            if( $request->titulo != $anuncio->titulo ){
                $validation['titulo'] = ['required', 'max:25'];
                $anuncio->titulo = $request['titulo'];
            }
            if( $request->descripcion != $anuncio->descripcion ){
                $validation['descripcion'] = ['required', 'max:255'];
                $anuncio->descripcion = $request['descripcion'];
            }
            if( $request->tiempos_id != $anuncio->tiempos_id ){
                $validation['tiempos_id'] = ['required'];
                $anuncio->tiempos_id = $request['tiempos_id'];
            }
            if( isset($request['img'])){
                $validation['img'] = ['image', 'max:5120'];
                $file = $request->file('img');
                $anuncio->img = '/storage/img/anuncios/'.$anuncio->id.".".$file->getClientOriginalExtension();
            }
            if( $request['states_id'] != $anuncio->states_id ){
                $validation['states_id'] = ['required'];
                $anuncio->states_id = $request['states_id'];
            }
    
            $request->validate($validation);
            $anuncio->save();
    
            if( $request['img'] != null ){
                $file = $request->file('img');
                $newFileName = $anuncio->id.".".$file->getClientOriginalExtension();
                $user ='/storage/img/anuncios/'.$newFileName;
                $ruta=public_path($user);
                Image::make($file->getRealPath())->fit(400, 400)->save($ruta,72);
            }
    
            if(Auth::user()->tipo_users_id == 1){
                $anuncios = Anuncios::all();
                return view('admin.anuncios', compact('anuncios'));
            }

            return redirect()->route('establecimiento.show', $request['establecimientos_id']);
        }        
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
