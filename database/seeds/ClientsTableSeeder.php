<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            [
                'id' => '1',
                'area_id' => '1',
                'first_name' => 'Brayan',
                'second_name' => 'Alberto',
                'nickname' => 'Mezut',
                'first_lastname' => 'Fernández',
                'second_lastname' => 'Rojas',
            ],
            [
                'id' => '2',
                'area_id' => '2',
                'first_name' => 'Roberth',
                'second_name' => null,
                'nickname' => 'Gallo',
                'first_lastname' => 'Parra',
                'second_lastname' => 'Alpizar',
            ],
            [
                'id' => '3',
                'area_id' => '3',
                'first_name' => 'Cesar',
                'second_name' => 'Andres',
                'nickname' => 'Chaba',
                'first_lastname' => 'Badiila',
                'second_lastname' => 'Chavarria',
            ]
            ]);
    }
}
