<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('localidades')->insert([//1
            'nombre'=>'San Sebastian',
            'slug'=>Str::slug('san-sebastian'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('localidades')->insert([//2
            'nombre'=>'San Andres',
            'slug'=>Str::slug('san-andres'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('localidades')->insert([//3
            'nombre'=>'Cofradia Del Rosario',
            'slug'=>Str::slug('cofradia'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('localidades')->insert([//4
            'nombre'=>'San Nicolas de Bari',
            'slug'=>Str::slug('nicolas'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('localidades')->insert([//5
            'nombre'=>'El Rodeo',
            'slug'=>Str::slug('rodeo'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('localidades')->insert([//6
            'nombre'=>'El Corralito',
            'slug'=>Str::slug('corralito'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
    }
}
