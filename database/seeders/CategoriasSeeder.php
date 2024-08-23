<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('pt_BR'); 

        for ($i = 0; $i < 20; $i++) { 
            DB::table('categorias')->insert([
                'nome_categoria' => strtoupper($faker->word),
                'status_categoria' => $faker->randomElement(['s', 'n']), 
            ]);
        }
    }
}
