<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // comanddo para refrescar los seeders
        // php artisan migrate:refresh --seed
        $this->call(CategoriaSeeder::class);
        $this->call(ProductoSeeder::class);
    }
}
