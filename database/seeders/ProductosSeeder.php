<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'nombre' => 'Manzana',
            'precio' => 123.45,
            'impuesto' => 5.00,
            'stock_actual' => 100,
            'stock_minimo' => 20,
            'categoria_id' => 1
        ]);
        Producto::create([
            'nombre' => 'Pantalón',
            'precio' => 45.65,
            'impuesto' => 15.00,
            'stock_actual' => 100,
            'stock_minimo' => 20,
            'categoria_id' => 2
        ]);
        Producto::create([
            'nombre' => 'Tablet',
            'precio' => 39.73,
            'impuesto' => 12.00,
            'stock_actual' => 100,
            'stock_minimo' => 20,
            'categoria_id' => 3
        ]);
        Producto::create([
            'nombre' => 'Silla',
            'precio' => 250.00,
            'impuesto' => 8.00,
            'stock_actual' => 100,
            'stock_minimo' => 20,
            'categoria_id' => 4
        ]);
        Producto::create([
            'nombre' => 'Pera',
            'precio' => 59.35,
            'impuesto' => 10.00,
            'stock_actual' => 100,
            'stock_minimo' => 20,
            'categoria_id' => 1
        ]);
    }
}
