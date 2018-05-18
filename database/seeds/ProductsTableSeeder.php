<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'id' => '1',
                'name' => 'Coca cola',
                'description' => 'bebida',
                'price' => '1000',
                'image' => '.png',
            ],
            [
                'id' => '2',
                'name' => 'Cerveza',
                'description' => 'bebida',
                'price' => '1000',
                'image' => '.png',
            ],
            [
                'id' => '3',
                'name' => 'Desayuno',
                'description' => 'comida',
                'price' => '2500',
                'image' => '.png',
            ],
            [
                'id' => '4',
                'name' => 'Almuerzo',
                'description' => 'comida',
                'price' => '3200',
                'image' => '.png',
            ],
            [
                'id' => '5',
                'name' => 'Café',
                'description' => 'bebida',
                'price' => '700',
                'image' => '.png',
            ],            [
                'id' => '6',
                'name' => 'Empanada',
                'description' => 'fritura',
                'price' => '600',
                'image' => '.png',
            ]
            ]);
    }
}
