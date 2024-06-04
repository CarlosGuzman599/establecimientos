<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('state_users')->insert([
            'descripcion'=>'PorAprobar',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('state_users')->insert([
            'descripcion'=>'Activo',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('state_users')->insert([
            'descripcion'=>'Inactivo',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('state_users')->insert([
            'descripcion'=>'Bloqueado',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
    }
}
