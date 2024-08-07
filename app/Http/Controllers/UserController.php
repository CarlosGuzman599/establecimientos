<?php

namespace App\Http\Controllers;

use App\Models\Localidades;
use App\Models\StateUser;
use App\Models\TipoUser;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rules\File;

use function League\Flysystem\Local\unlink;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if(Auth::user()->tipo_users_id == 1){
            $users = User::all();
            return view('admin.users', compact('users'));
        }else{
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        return User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $user = User::find($id);
        $localidades = Localidades::all();
        $state_user = StateUser::all();
        $tipo_users = TipoUser::all();
        return view('users.edit', compact('user', 'localidades', 'state_user', 'tipo_users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $user =  User::find($id);
        $validation = [];

        if( $request['name'] != $user->name ){
            $validation['name'] = ['required', 'string', 'max:255', 'regex:([a-zA-Z] [a-zA-Z]*)'];
            $user->name = $request['name'];
        }

        if( $request['phone'] != $user->phone ){
            $validation['phone'] = ['required', 'string', 'size:10', 'unique:users'];
            $user->phone = $request['phone'];
        }

        if(  $request['img'] != NULL && $request['img'] != $user->img ){
            $validation['img'] = ['required'];

            if(str_contains($request['img'], 'avatar')){
                $user->img = '/storage/img/avatar/'.$request['img'].".png";
            }else{
                $validation['img'] = ['required', 'photo' => 'mimes:jpg,bmp,png', File::image()->max(5 * 5120)];
                $file = $request->file('img');
                $user->img = '/storage/img/users/'.$id.".".$file->getClientOriginalExtension();
            }

        }

        if( $request['localidad_users_id'] != $user->localidad_users_id ){
            $validation['localidad_users_id'] = ['required'];  
            $user->localidad_users_id = $request['localidad_users_id']; 
        }

        if( $request['password'] != '' ){
            $validation['password'] = ['required', 'string', 'min:8', 'confirmed'];
            $user->password = $request['password'];
        }

        if($request['state_users_id'] != $user->state_users_id){
            $validation['state_users_id'] = ['required'];
            $user->state_users_id = $request['state_users_id'];
        }

        if($request['tipo_users_id'] != $user->tipo_users_id){
            $validation['tipo_users_id'] = ['required'];
            $user->tipo_users_id = $request['tipo_users_id'];
        }

        $request->validate($validation);
        $user->save();

        if( $request['img'] != null && !(str_contains($request['img'], 'users'))){

            $file = $request->file('img');
            $newFileName = $id.".".$file->getClientOriginalExtension();
            $user ='/storage/img/users/'.$newFileName;
            $ruta=public_path($user);
            Image::make($file->getRealPath())->fit(400, 400)->save($ruta,72);
        }

        if(Auth::user()->tipo_users_id == 1){
            $users = User::all();
            return view('admin.users', compact('users'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $user = User::find($id);
        if(Auth::user()->tipo_users_id == 1 || Auth::user()->id == $user->id){
            if (User::destroy($id)) {
                return response()->json(['status'=>200] , 200);
            }else{
                return response()->json(['status'=>500] , 500);
            }
        }else{
            return response()->json(['status'=>401] , 401);
        }

    }
}
