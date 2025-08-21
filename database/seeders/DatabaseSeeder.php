<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            GeneroSeeder::class,    // 1º Cria os gêneros
            FilmeSeeder::class,     // 2º Cria os filmes e associa os gêneros
            AvaliacaoSeeder::class, // 3º Cria as avaliações para os filmes existentes
        ]);
    }
}
