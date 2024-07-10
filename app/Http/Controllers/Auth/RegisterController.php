<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rules\File;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){
        if(str_contains($data['img'], 'avatar')){
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255', 'regex:([a-zA-Z] [a-zA-Z]*)'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone' => ['required', 'string', 'size:10', 'unique:users'],
                'img' => ['required'],
                'localidad_users_id' => ['required'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],['name.regex' => 'Proporcione segundo nombre o apellido']);
        }else{
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255', 'regex:([a-zA-Z] [a-zA-Z]*)'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone' => ['required', 'string', 'size:10', 'unique:users'],
                'img' => ['required', 'photo' => 'mimes:jpg,bmp,png', File::image()->max(5 * 5120)],
                'localidad_users_id' => ['required'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],['name.regex' => 'Proporcione segundo nombre o apellido']);

        }

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data){
        if(str_contains($data['img'], 'avatar')){
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'img' => '/storage/img/avatar/'.$data['img'].".png",
                'state_users_id' => 1,
                'localidad_users_id' => $data['localidad_users_id'],
                'password' => Hash::make($data['password'])
            ]);
        }else{
            $request = app('request');
            $file = $request->file('img');
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'img' => '/storage/img/users/'.((int)User::latest('id')->first()->id + 1).".".$file->getClientOriginalExtension(),
                'state_users_id' => 1,
                'localidad_users_id' => $data['localidad_users_id'],
                'password' => Hash::make($data['password'])
            ]);
            $newFileName = ((int)User::latest('id')->first()->id).".".$file->getClientOriginalExtension();
            $ruta = public_path('/storage/img/users/'.$newFileName);
            Image::make($file->getRealPath())->fit(400, 400)->save($ruta,72);
            return $user;
        }
    }
}
