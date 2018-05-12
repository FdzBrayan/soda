<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
        [
            'id' => '1',
            'name' => 'Planta',
            'icon' => 'planta.png',
        ],
        [
            'id' => '2',
            'name' => 'Campo',
            'icon' => 'campo.png',
        ],
        [
            'id' => '3',
            'name' => 'Fijos',
            'icon' => 'fijo.png',
        ]
        ]);
    }
}
