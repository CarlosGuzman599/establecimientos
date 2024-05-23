<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TiemposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tiempos')->insert([
            'descripcion'=>'1 hora',
            'slug'=>Str::slug('1h'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('tiempos')->insert([
            'descripcion'=>'3 horas',
            'slug'=>Str::slug('3h'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('tiempos')->insert([
            'descripcion'=>'6 horas',
            'slug'=>Str::slug('6h'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('tiempos')->insert([
            'descripcion'=>'12 horas',
            'slug'=>Str::slug('12h'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('tiempos')->insert([
            'descripcion'=>'1 dia',
            'slug'=>Str::slug('1d'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('tiempos')->insert([
            'descripcion'=>'1 semana',
            'slug'=>Str::slug('1w'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('tiempos')->insert([
            'descripcion'=>'1 mes',
            'slug'=>Str::slug('1m'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('tiempos')->insert([
            'descripcion'=>'1 anio',
            'slug'=>Str::slug('1y'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
    }
}
