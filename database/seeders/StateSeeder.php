<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('states')->insert([
            'descripcion'=>'Activo',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('states')->insert([
            'descripcion'=>'Inactivo',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('states')->insert([
            'descripcion'=>'Bloqueado',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        
    }
}
