<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genero;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema; 

class GeneroSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints(); 
        DB::table('filme_genero')->truncate();
        DB::table('generos')->truncate();
        Schema::enableForeignKeyConstraints(); 

        $generos = [
            ['nome' => 'Ação'],
            ['nome' => 'Aventura'],
            ['nome' => 'Ficção Científica'],
            ['nome' => 'Drama'],
            ['nome' => 'Fantasia'],
            ['nome' => 'Comédia'],
            ['nome' => 'Faroeste'],
            ['nome' => 'Crime'],
            ['nome' => 'Suspense'],
            ['nome' => 'Musical'],
            ['nome' => 'Biografia'],
            ['nome' => 'Romance'],
        ];

        Genero::insert($generos);
    }
}
