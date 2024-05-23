<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categorias')->insert([
            'nombre'=>'salud animal',
            'slug'=>Str::slug('sal-ani'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'comida',
            'slug'=>Str::slug('comida'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'mano de obra',
            'slug'=>Str::slug('mano-obra'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'gimnasio',
            'slug'=>Str::slug('gimnasio'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'tecnico',
            'slug'=>Str::slug('tecnico'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'profesional',
            'slug'=>Str::slug('profesional'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'hospedaje',
            'slug'=>Str::slug('hospedaje'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'salud',
            'slug'=>Str::slug('salud'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'ropa-calzado',
            'slug'=>Str::slug('ropa-calzado'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'tecnologia',
            'slug'=>Str::slug('tecnologia'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'taller',
            'slug'=>Str::slug('taller'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'refaccionaria',
            'slug'=>Str::slug('refaccionaria'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'abarrotes',
            'slug'=>Str::slug('abarrotes'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'bar-cafe',
            'slug'=>Str::slug('bar-cafe'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'carniceria',
            'slug'=>Str::slug('carniceria'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'estetica',
            'slug'=>Str::slug('estetica'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'tortilleria',
            'slug'=>Str::slug('tortilleria'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'lavanderia',
            'slug'=>Str::slug('lavanderia'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'servifiestas',
            'slug'=>Str::slug('servifiestas'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'papeleria',
            'slug'=>Str::slug('papeleria'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'fruteria',
            'slug'=>Str::slug('fruteria'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'ferreteria',
            'slug'=>Str::slug('ferreteria'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'panaderia',
            'slug'=>Str::slug('panaderia'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'floreria',
            'slug'=>Str::slug('floreria'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'musica',
            'slug'=>Str::slug('musica'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'guarderia',
            'slug'=>Str::slug('guarderia'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'transporte',
            'slug'=>Str::slug('transporte'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'artesanias',
            'slug'=>Str::slug('artesanias'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'nombre'=>'otros',
            'slug'=>Str::slug('otros'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
    }
}
