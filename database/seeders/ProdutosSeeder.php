<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutosSeeder extends Seeder
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
            DB::table('produtos')->insert([
                'nome_produto' => $faker->word, 
                'medida_produto' => $faker->word, 
                'preco_produto' => $faker->randomFloat(2, 1, 100), 
                'id_categoria' => $faker->numberBetween(1, 10), 
                'status_produto' => $faker->randomElement(['s', 'n']), 
            ]);
        }
    }
}