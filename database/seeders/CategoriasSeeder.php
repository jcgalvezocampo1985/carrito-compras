<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre' => 'Frutas y Verduras'
        ]);

        Categoria::create([
            'nombre' => 'Ropa'
        ]);

        Categoria::create([
            'nombre' => 'Tecnología'
        ]);

        Categoria::create([
            'nombre' => 'Muebles'
        ]);
    }
}
