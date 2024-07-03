<?php

namespace Database\Seeders;

use App\Models\TipoUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        TipoUser::create([
            'nombre' => 'Administrador'//1
        ]);

        TipoUser::create([
            'nombre' => 'Vendedor'//2
        ]);

        TipoUser::create([
            'nombre' => 'Cliente'//3
        ]);

        User::create([
            'name'=>'Carlos Guzman Encarnacion',
            'img'=>'/storage/img/avatar/avatar_support.png',
            'email'=>'carlilloz.599@gmail.com',
            'phone'=>'3411785798',
            'localidad_users_id' => 1,
            "tipo_users_id"=> 1,
            "state_users_id" => 2,
            'email_verified_at'=>Carbon::now(),
            'password'=>Hash::make('carlos@599'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        User::create([
            'name'=>'Mayra Azucena Ignacio Encarnacion',
            'img'=>'/storage/img/avatar/avatar_female_003.png',
            'email'=>'gacita_bella@gmail.com',
            'phone'=>'3411785799',
            'localidad_users_id' => 4,
            "tipo_users_id" => 2,
            "state_users_id" => 1,
            'email_verified_at'=>Carbon::now(),
            'password'=>Hash::make('gacita599'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
    }
}
