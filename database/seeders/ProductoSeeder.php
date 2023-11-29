<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //AGREGAMOS ESTA LIBRERIA

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'id' => '1',
            'nombre' => 'Pizza napolitana',
            'descripcion' => 'La pizza napolitana, de masa tierna y delgada ',
            'precio' => 40,
            'stock' => 0,
            'estado' => 1,
            'id_categoria' => 1
        ]);
        DB::table('productos')->insert([
            'id' => '2',
            'nombre' => 'Pizza hawaiana',
            'descripcion' => 'Tomate frito · 4 rodajas de piña · Queso rallado ',
            'precio' => 52,
            'stock' => 0,
            'estado' => 1,
            'id_categoria' => 1
        ]);
        DB::table('productos')->insert([
            'id' => '3',
            'nombre' => 'Coca Cola',
            'descripcion' => 'Gaseosa de 2 L',
            'precio' => 12.00,
            'stock' => 0,
            'estado' => 1,
            'id_categoria' => 2
        ]);
        DB::table('productos')->insert([
            'id' => '4',
            'nombre' => 'Fanta',
            'descripcion' => 'Gaseosa de 2L',
            'precio' => 12.4,
            'stock' => 0,
            'estado' => 1,
            'id_categoria' => 2
        ]);

    }
}
