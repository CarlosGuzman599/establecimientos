<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;

use App\Models\Anuncios;
use App\Models\Categorias;
use App\Models\Localidades;
use Illuminate\Http\Request;
use App\Models\Establecimiento;
use App\Models\State;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EstablecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if(Auth::user()->tipo_users_id == 1){
            $establecimientos = Establecimiento::all();
            return view('admin.establecimientos', compact('establecimientos'));
        }else{
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categorias = Categorias::all();
        $localidades = Localidades::all();
        return view('establecimientos.create', compact('categorias','localidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
            'nombre' => 'required|max:30|unique:establecimientos,nombre',
            'users_id' => 'required',
            'categorias_id' => 'required',
            'localidades_id' => 'required',
            'logo' => 'nullable|image|max:2048',
            'protection' => 'required',
            'delivery' => 'required',
            'direccion' => 'required',
            'colonia' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'telefono' => 'required|size:10',
            'descripcion' => 'required|max:255',
            'horario' => 'required',
        ]);

        if ( isset($request['logo']) ){
            $request = app('request');
            $file = $request->file('logo');
            Establecimiento::create([
                'nombre' => $request['nombre'],
                'users_id' => $request['users_id'],
                'categorias_id' => $request['categorias_id'],
                'localidades_id' => $request['localidades_id'],
                'logo' => '/storage/img/logos/'.((int)Establecimiento::latest('id')->first()->id + 1).".".$file->getClientOriginalExtension(),
                'protection' => $request['protection'],
                'delivery' => $request['delivery'],
                'direccion' => $request['direccion'],
                'colonia' => $request['colonia'],
                'lat' => $request['lat'],
                'lng' => $request['lng'],
                'telefono' => $request['telefono'],
                'descripcion' => $request['descripcion'],
                'horario' => $request['horario'],
            ]); 

            $newFileName = ((int)Establecimiento::latest('id')->first()->id).".".$file->getClientOriginalExtension();
            $ruta = public_path('/storage/img/logos/'.$newFileName);
            Image::make($file->getRealPath())->fit(400, 400)->save($ruta,72);

        }else{
            Establecimiento::create($request->all());
        }
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Establecimiento $establecimiento)
    {
        $anuncios = Anuncios::where('establecimientos_id', $establecimiento->id)->get();
        if ($establecimiento->states_id != 1) {
            abort(404);
        }else{
            return view('establecimientos.show', compact('establecimiento', 'anuncios'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Establecimiento $establecimiento){
        if(!(Auth::user() && ((Auth::user()->id == $establecimiento->users_id) || (Auth::user()->tipo_users_id == 1)))){
            abort(404);
        }

        if(($establecimiento->states_id != 1 && Auth::user()->tipo_users_id != 1)){
            abort(404);
        }

        $user = User::find($establecimiento->users_id);
        $states = State::all();
        $categorias = Categorias::all();
        $localidades = Localidades::all();
        return view('establecimientos.edit', compact('categorias','localidades', 'establecimiento', 'user', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        try{

        

        $establecimiento = Establecimiento::find($id);

        if(!(Auth::user() && (Auth::user()->id == $establecimiento->users_id || Auth::user()->tipo_users_id == 1))){
            abort(404);
        }

        if(!(isset($request['users_id']))){
            $establecimiento->states_id = 2;
            $establecimiento->save();
        }else{

            $validation = [];
            if( $request['users_id'] != $establecimiento->users_id ){
                $validation['users_id'] = ['required'];
                $establecimiento->users_id = $request['users_id'];
            }
            if( $request['nombre'] != $establecimiento->nombre ){
                $validation['nombre'] = ['required'];
                $establecimiento->nombre = $request['nombre'];
            }
            if( $request['categorias_id'] != $establecimiento->categorias_id ){
                $validation['categorias_id'] = ['required'];
                $establecimiento->categorias_id = $request['categorias_id'];
            }
            if( $request['localidades_id'] != $establecimiento->localidades_id ){
                $validation['localidades_id'] = ['required'];
                $establecimiento->localidades_id = $request['localidades_id'];
            }
            if( isset($request['logo']) && $request['logo'] != $establecimiento->logo){
                $validation['logo'] = ['nullable', 'image', 'max:5120'];
                $establecimiento->logo = $request['logo'];
                $file = $request->file('logo');
                $establecimiento->logo = '/storage/img/logos/'.$id.".".$file->getClientOriginalExtension();
            }
            if( $request['protection'] != $establecimiento->protection ){
                $validation['protection'] = ['required'];
                $establecimiento->protection = $request['protection'];
            }
            if( $request['delivery'] != $establecimiento->delivery ){
                $validation['delivery'] = ['required'];
                $establecimiento->delivery = $request['delivery'];
            }
            if( $request['direccion'] != $establecimiento->direccion ){
                $validation['direccion'] = ['required'];
                $establecimiento->direccion = $request['direccion'];
            }
            if( $request['colonia'] != $establecimiento->colonia ){
                $validation['colonia'] = ['required'];
                $establecimiento->colonia = $request['colonia'];
            }
            if( $request['lat'] != $establecimiento->lat ){
                $validation['lat'] = ['required'];
                $establecimiento->lat = $request['lat'];
            }
            if( $request['lng'] != $establecimiento->lng ){
                $validation['lng'] = ['required'];
                $establecimiento->lng = $request['lng'];
            }
            if( $request['telefono'] != $establecimiento->telefono ){
                $validation['telefono'] = ['required', 'size:10'];
                $establecimiento->telefono = $request['telefono'];
            }
            if( $request['descripcion'] != $establecimiento->descripcion ){
                $validation['descripcion'] = ['required', 'max:255'];
                $establecimiento->descripcion = $request['descripcion'];
            }
            if( $request['horario'] != $establecimiento->horario ){
                $validation['horario'] = ['required'];
                $establecimiento->horario = $request['horario'];
            }

            if(isset($request['states_id'])){
                if( $request['states_id'] != $establecimiento->states_id ){
                    $establecimiento->states_id = $request['states_id'];
                }
            }

            $request->validate($validation);
            $establecimiento->save();

            if( $request['logo'] != null ){
                $file = $request->file('logo');
                $newFileName = $id.".".$file->getClientOriginalExtension();
                $user ='/storage/img/logos/'.$newFileName;
                $ruta=public_path($user);
                Image::make($file->getRealPath())->fit(400, 400)->save($ruta,72);
            }

            if(Auth::user()->tipo_users_id == 1){
                $establecimientos = Establecimiento::all();
                return view('admin.establecimientos', compact('establecimientos'));
            }
    
            return redirect()->route('home');


        }


    }catch(Exception $e){
        return $e;
    }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Establecimiento $establecimiento){
        try{
            $anuncios = Anuncios::where('establecimientos_id', $establecimiento->id)->get();
            Anuncios::where('establecimientos_id', $establecimiento->id)->delete();

            foreach($anuncios as $anuncio){
                if(!$anuncio->img==null){
                    unlink(str_replace('/storage', 'storage', $anuncio->img));
                }
            }

            $establecimiento->delete();
            if(!$establecimiento->logo==null){
                unlink(str_replace('/storage', 'storage', $establecimiento->logo));
            }
            return response()->json(['status'=>200] , 200);
        }catch(Exception $e){
            //return response()->json(['Error!'=>'ErrorToShow  -> '.$e->getMessage()] , 500);
            return $e->getMessage();
        }
    }
}
