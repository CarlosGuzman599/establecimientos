<?php

namespace Database\Seeders;

use App\Models\TipoUser;
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
            'name' => 'admin'//1
        ]);

        TipoUser::create([
            'name' => 'seller'//2
        ]);

        TipoUser::create([
            'name' => 'client'//3
        ]);

        DB::table('users')->insert([
            'name'=>'Carlos Guzman Encarnacion',
            'email'=>'carlilloz.599@gmail.com',
            'phone'=>'3411785798',
            'localidad_users_id'=>1,
            "tipo_users_id"=> 1,
            'email_verified_at'=>Carbon::now(),
            'password'=>Hash::make('carlos@599'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        
        DB::table('users')->insert([
            'name'=>'Mayra Azucena Ignacio Encarnacion',
            'email'=>'gacita_bella@gmail.com',
            'phone'=>'3411785799',
            'localidad_users_id'=>4,
            'email_verified_at'=>Carbon::now(),
            'password'=>Hash::make('gacita599'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
    }
}
