<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(StatusSeeder::class);
        $this->call(TiemposSeeder::class);
        $this->call(LocalidadSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategoriaSeeder::class);
        
    }
}
