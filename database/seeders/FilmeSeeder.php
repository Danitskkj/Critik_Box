<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Filme;
use App\Models\Genero;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FilmeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('filme_genero')->truncate();
        Filme::truncate();
        Schema::enableForeignKeyConstraints();

        $filmes = [
            [
                'titulo' => 'Círculo de Fogo', 'ano_lancamento' => 2013, 'diretor' => 'Guillermo del Toro',
                'sinopse' => 'União de países cria um robô gigante como arma para enfrentar os monstros gigantes que invadem a Terra a partir do fundo do oceano.',
                'poster_url' => 'https://m.media-amazon.com/images/M/MV5BZDhkODk2Y2UtNTEwYy00ZmMzLWI2NDMtNzYyYWJjMmNjYjYxXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg',
                'generos' => ['Ação', 'Aventura', 'Ficção Científica']
            ],
            [
                'titulo' => 'Como Treinar o Seu Dragão', 'ano_lancamento' => 2010, 'diretor' => 'Chris Sanders, Dean DeBlois',
                'sinopse' => 'Soluço é um jovem viking que não tem capacidade para lutar contra os dragões, como é a tradição local. Sua vida muda quando ele ajuda um dragão que lhe mostra toda a verdade.',
                'poster_url' => 'https://m.media-amazon.com/images/M/MV5BMjA5NDQyMjc2NF5BMl5BanBnXkFtZTcwMjg5ODcyMw@@._V1_.jpg',
                'generos' => ['Drama', 'Aventura', 'Fantasia']
            ],
            [
                'titulo' => 'Como Treinar o Seu Dragão 2', 'ano_lancamento' => 2014, 'diretor' => 'Dean DeBlois',
                'sinopse' => 'Soluço convive com o dragão Fúria da Noite. Um dia, Soluço encontra centenas de novos dragões numa caverna secreta, que não pretendem facilitar a vida dos habitantes da ilha.',
                'poster_url' => 'https://m.media-amazon.com/images/M/MV5BNDlmYTViNTUtMWM0OC00MDlmLThiYTAtN2NlY2Y4MGNlOTZlXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg',
                'generos' => ['Drama', 'Aventura', 'Fantasia']
            ],
            [
                'titulo' => 'Shrek 2', 'ano_lancamento' => 2004, 'diretor' => 'Andrew Adamson',
                'sinopse' => 'A princesa e o ogro vivem felizes no pântano. Quando os pais da princesa descobrem que ela não se casou com o Príncipe Encantado, os problemas começam.',
                'poster_url' => 'https://www.themoviedb.org/t/p/w1280/2yYP0PQjG8zVqturh1BAqu2Tixl.jpg',
                'generos' => ['Comédia', 'Aventura', 'Fantasia']
            ],
            [
                'titulo' => 'Shrek', 'ano_lancamento' => 2001, 'diretor' => 'Andrew Adamson',
                'sinopse' => 'Um ogro tem sua vida invadida por personagens de contos de fadas. Ele faz um acordo pra resgatar uma princesa.',
                'poster_url' => 'https://m.media-amazon.com/images/M/MV5BMTk2NTE1NTE0M15BMl5BanBnXkFtZTgwNjY4NTYxMTE@._V1_.jpg',
                'generos' => ['Comédia', 'Aventura', 'Fantasia']
            ],
            [
                'titulo' => 'Madagascar', 'ano_lancamento' => 2005, 'diretor' => 'Eric Darnell, Tom McGrath',
                'sinopse' => 'O leão Alex é o rei da selva urbana, a principal atração no zoológico de Nova York. Ele e seus melhores amigos decidem explorar o mundo.',
                'poster_url' => 'https://www.themoviedb.org/t/p/w1280/A3xzOyFlWxoGFPG4aUGX8zMS4OA.jpg',
                'generos' => ['Comédia', 'Aventura']
            ],
            [
                'titulo' => 'Kung Fu Panda', 'ano_lancamento' => 2008, 'diretor' => 'Mark Osborne, John Stevenson',
                'sinopse' => 'Po é um panda que sonha em transformar-se em um mestre de kung fu. Seu sonho se torna realidade quando, inesperadamente, ele deve cumprir uma profecia antiga.',
                'poster_url' => 'https://m.media-amazon.com/images/M/MV5BZDU5MDNiMGItYjVmZi00NDUxLTg2OTktNGE0NzNlNzM4NzgyXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg',
                'generos' => ['Ação', 'Comédia', 'Fantasia']
            ],
            [
                'titulo' => 'Megamente', 'ano_lancamento' => 2010, 'diretor' => 'Tom McGrath',
                'sinopse' => 'Embora seja o vilão mais brilhante, Megamente fica surpreso quando finalmente consegue derrotar o seu inimigo. Sem propósito, ele cria um novo adversário.',
                'poster_url' => 'https://m.media-amazon.com/images/M/MV5BMTY0OTc0MTc5M15BMl5BanBnXkFtZTcwMjQzMTg4Mw@@._V1_.jpg',
                'generos' => ['Ação', 'Comédia', 'Ficção Científica']
            ],
            [
                'titulo' => 'Toy Story', 'ano_lancamento' => 1995, 'diretor' => 'John Lasseter, Pete Docter',
                'sinopse' => 'O brinquedo cowboy Woody vê sua posição como o brinquedo favorito de Andy ameaçada quando seus pais lhe compram um Buzz Lightyear.',
                'poster_url' => 'https://m.media-amazon.com/images/M/MV5BZTA3OWVjOWItNjE1NS00NzZiLWE1MjgtZDZhMWI1ZTlkNzYwXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg',
                'generos' => ['Aventura', 'Comédia', 'Fantasia']
            ],
            [
                'titulo' => 'Vida de Inseto', 'ano_lancamento' => 1998, 'diretor' => 'John Lasseter, Andrew Stanton',
                'sinopse' => 'Flik é uma formiga criativa que causa um acidente. Para se redimir, ele busca ajuda de insetos "guerreiros", que na verdade são artistas de circo.',
                'poster_url' => 'https://m.media-amazon.com/images/M/MV5BMTJlNDQ0MzQtNjU5ZS00YWYxLWJjZGItYzkyZTM1ZDFjNDZlXkEyXkFqcGc@._V1_FMjpg_UX760_.jpg',
                'generos' => ['Aventura', 'Comédia']
            ],
            [
                'titulo' => 'Toy Story 2', 'ano_lancamento' => 1999, 'diretor' => 'John Lasseter',
                'sinopse' => 'Woody é sequestrado por um colecionador, e Buzz Lightyear parte em uma missão de resgate para salvá-lo antes que seja vendido para um museu.',
                'poster_url' => 'https://m.media-amazon.com/images/M/MV5BYTIyNTFjODItNGZjMy00ODc3LTlhODYtYTAyMTIxNzYxYjRjXkEyXkFqcGc@._V1_.jpg',
                'generos' => ['Aventura', 'Comédia', 'Fantasia']
            ],
            [
                'titulo' => 'Monstros S.A.', 'ano_lancamento' => 2001, 'diretor' => 'Pete Docter',
                'sinopse' => 'A cidade de Monstropolis é movida pelos gritos das crianças. Quando uma menina humana entra no mundo dos monstros, Sulley e Mike precisam devolvê-la.',
                'poster_url' => 'https://www.themoviedb.org/t/p/w1280/5p6cdAeUevsLOX0oI1T4JIul4QO.jpg',
                'generos' => ['Aventura', 'Comédia', 'Fantasia']
            ],
            [
                'titulo' => 'Procurando Nemo', 'ano_lancamento' => 2003, 'diretor' => 'Andrew Stanton',
                'sinopse' => 'Um peixe-palhaço superprotetor chamado Marlin parte em uma jornada pelo oceano para encontrar seu filho Nemo, que foi capturado por um mergulhador.',
                'poster_url' => 'https://m.media-amazon.com/images/M/MV5BNzE3M2I3NDctMTE2OC00ZjMwLWI0NzctZGJiMDQyNWNkYmI3XkEyXkFqcGc@._V1_.jpg',
                'generos' => ['Aventura', 'Drama']
            ],
            [
                'titulo' => 'Os Incríveis', 'ano_lancamento' => 2004, 'diretor' => 'Brad Bird',
                'sinopse' => 'Uma família de super-heróis aposentados é forçada a voltar à ação quando um vilão surge com um plano maligno.',
                'poster_url' => 'https://m.media-amazon.com/images/M/MV5BMTY5OTU0OTc2NV5BMl5BanBnXkFtZTcwMzU4MDcyMQ@@._V1_FMjpg_UX1000_.jpg',
                'generos' => ['Ação', 'Aventura', 'Ficção Científica']
            ],
            [
                'titulo' => 'Carros', 'ano_lancamento' => 2006, 'diretor' => 'John Lasseter',
                'sinopse' => 'O arrogante carro de corrida Relâmpago McQueen acaba preso em uma pequena cidade, onde aprende lições valiosas sobre amizade.',
                'poster_url' => 'https://www.themoviedb.org/t/p/w1280/d3a9nafpB6rUWckVptwpTJ0Sy0l.jpg',
                'generos' => ['Aventura', 'Comédia']
            ],
            [
                'titulo' => 'Ratatouille', 'ano_lancamento' => 2007, 'diretor' => 'Brad Bird',
                'sinopse' => 'Remy, um rato que sonha em ser um grande chef, forma uma parceria improvável com um ajudante de cozinha desastrado para provar que qualquer um pode cozinhar.',
                'poster_url' => 'https://m.media-amazon.com/images/M/MV5BMzgwNzY0MDkwOF5BMl5BanBnXkFtZTcwNzMxMDI1MQ@@._V1_.jpg',
                'generos' => ['Drama', 'Aventura', 'Fantasia']
            ],
            [
                'titulo' => 'WALL-E', 'ano_lancamento' => 2008, 'diretor' => 'Andrew Stanton',
                'sinopse' => 'WALL-E, um robô solitário, se apaixona por EVE, uma robô em missão. Juntos, eles embarcam em uma jornada que muda o destino da humanidade.',
                'poster_url' => 'https://www.themoviedb.org/t/p/w1280/2TfYp0eMPrcKNjX6PTKGGQODjfF.jpg',
                'generos' => ['Aventura', 'Ficção Científica', 'Romance']
            ],
            [
                'titulo' => 'Up – Altas Aventuras', 'ano_lancamento' => 2009, 'diretor' => 'Pete Docter',
                'sinopse' => 'Carl Fredricksen, um idoso viúvo, realiza seu sonho de viajar para a América do Sul amarrando milhares de balões em sua casa.',
                'poster_url' => 'https://www.themoviedb.org/t/p/w1280/kms7XVDS6v7ic2jEw6N4DslQrWx.jpg',
                'generos' => ['Aventura', 'Drama']
            ],
            [
                'titulo' => 'Toy Story 3', 'ano_lancamento' => 2010, 'diretor' => 'Lee Unkrich',
                'sinopse' => 'Andy está prestes a ir para a faculdade, e seus brinquedos são doados para uma creche. Eles precisam fugir antes que sejam destruídos.',
                'poster_url' => 'https://www.themoviedb.org/t/p/w1280/rf67AeS9nP8DD7dZYbvhjEVoIBf.jpg',
                'generos' => ['Aventura', 'Comédia', 'Fantasia']
            ],
            [
                'titulo' => 'Interestelar', 'ano_lancamento' => 2014, 'diretor' => 'Christopher Nolan',
                'sinopse' => 'Um grupo de astronautas viaja através de um buraco de minhoca em busca de um novo planeta para a humanidade.',
                'poster_url' => 'https://www.themoviedb.org/t/p/w1280/nCbkOyOMTEwlEV0LtCOvCnwEONA.jpg',
                'generos' => ['Aventura', 'Drama', 'Ficção Científica']
            ],
            [
                'titulo' => 'Parasita', 'ano_lancamento' => 2019, 'diretor' => 'Bong Joon-ho',
                'sinopse' => 'Uma família desempregada se infiltra na vida de uma família rica, mas uma descoberta inesperada desencadeia o caos.',
                'poster_url' => 'https://www.themoviedb.org/t/p/w1280/bik2BZjmVjeE6LOZqtuTjb4jJPQ.jpg',
                'generos' => ['Drama', 'Suspense', 'Comédia']
            ],
            [
                'titulo' => 'Django Livre', 'ano_lancamento' => 2012, 'diretor' => 'Quentin Tarantino',
                'sinopse' => 'Um escravo liberto parte em uma missão para resgatar sua esposa de um brutal proprietário de uma plantação.',
                'poster_url' => 'https://m.media-amazon.com/images/S/pv-target-images/af60021aa2aa403d291b4f3012a010122710eda637c7407485f32a5a7bb1906f.jpg',
                'generos' => ['Faroeste', 'Drama', 'Ação']
            ],
            [
                'titulo' => 'Pulp Fiction: Tempo de Violência', 'ano_lancamento' => 1994, 'diretor' => 'Quentin Tarantino',
                'sinopse' => 'As vidas de vários personagens se entrelaçam em uma narrativa não linear de violência e redenção.',
                'poster_url' => 'https://m.media-amazon.com/images/M/MV5BM2JiMDdlY2QtNjk2ZC00ZjhhLWE1ZjktMTYyODBmMWZiOGUzXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg',
                'generos' => ['Crime', 'Drama', 'Comédia']
            ],
            [
                'titulo' => 'Whiplash: Em Busca da Perfeição', 'ano_lancamento' => 2014, 'diretor' => 'Damien Chazelle',
                'sinopse' => 'Um jovem baterista de jazz é levado ao limite por um instrutor abusivo.',
                'poster_url' => 'https://www.themoviedb.org/t/p/w1280/dtnzzmGOy2Ni89Ir4I1FTO40FJQ.jpg',
                'generos' => ['Drama', 'Musical']
            ],
            [
                'titulo' => 'Trem-Bala', 'ano_lancamento' => 2022, 'diretor' => 'David Leitch',
                'sinopse' => 'Cinco assassinos com missões interligadas se encontram em um trem-bala no Japão.',
                'poster_url' => 'https://m.media-amazon.com/images/M/MV5BZTQxNTcwNDAtNTYyNS00NmMxLTk1YzEtMzMxMzcwYmViZTQ1XkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg',
                'generos' => ['Ação', 'Comédia', 'Suspense']
            ],
            [
                'titulo' => 'Kick-Ass: Quebrando Tudo', 'ano_lancamento' => 2010, 'diretor' => 'Matthew Vaughn',
                'sinopse' => 'Um adolescente comum se torna um super-herói da vida real, inspirando um movimento de vigilantes.',
                'poster_url' => 'https://www.themoviedb.org/t/p/w1280/Lw92onUVD9eg04JltAas5KWkSy.jpg',
                'generos' => ['Ação', 'Comédia', 'Crime']
            ],
            [
                'titulo' => 'O Castelo Animado', 'ano_lancamento' => 2004, 'diretor' => 'Hayao Miyazaki',
                'sinopse' => 'Uma jovem amaldiçoada busca refúgio no castelo ambulante de um mago excêntrico.',
                'poster_url' => 'https://www.themoviedb.org/t/p/w1280/1hTfaEWktMJPxCk5nZNtK7F86C9.jpg',
                'generos' => ['Drama', 'Aventura', 'Fantasia']
            ],
            [
                'titulo' => 'Prenda-me se For Capaz', 'ano_lancamento' => 2002, 'diretor' => 'Steven Spielberg',
                'sinopse' => 'Um jovem falsificador se passa por várias profissões enquanto é perseguido por um agente do FBI.',
                'poster_url' => 'https://www.themoviedb.org/t/p/w1280/joqCuOj9JCGAcAqAOEj4f7czfYb.jpg',
                'generos' => ['Biografia', 'Crime', 'Drama']
            ],
            [
                'titulo' => 'Duna: Parte 2', 'ano_lancamento' => 2024, 'diretor' => 'Denis Villeneuve',
                'sinopse' => 'Paul Atreides se une aos Fremen para vingar sua família e evitar um futuro terrível.',
                'poster_url' => 'https://www.themoviedb.org/t/p/w1280/8LJJjLjAzAwXS40S5mx79PJ2jSs.jpg',
                'generos' => ['Ação', 'Aventura', 'Ficção Científica']
            ],
            [
                'titulo' => 'Sonic 2: O Filme', 'ano_lancamento' => 2022, 'diretor' => 'Jeff Fowler',
                'sinopse' => 'Sonic e Tails se unem para impedir que Dr. Robotnik e Knuckles encontrem uma esmeralda poderosa.',
                'poster_url' => 'https://www.themoviedb.org/t/p/w1280/aT2vdnR3qifI21f7fHTqYW5iAAz.jpg',
                'generos' => ['Ação', 'Aventura', 'Comédia']
            ],
        ];

        foreach ($filmes as $filmeData) {
            $filme = Filme::create([
                'titulo' => $filmeData['titulo'],
                'ano_lancamento' => $filmeData['ano_lancamento'],
                'diretor' => $filmeData['diretor'],
                'sinopse' => $filmeData['sinopse'],
                'poster_url' => $filmeData['poster_url'],
            ]);

            // Busca os IDs dos gêneros com base nos nomes
            $generosIDs = Genero::whereIn('nome', $filmeData['generos'])->pluck('id');

            // Associa os gêneros ao filme
            $filme->generos()->attach($generosIDs);
        }
    }
}
