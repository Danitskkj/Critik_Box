<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Filme;
use App\Models\Avaliacao;
use Carbon\Carbon;

class AvaliacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Avaliacao::truncate();

        $filmes = Filme::all();
        if ($filmes->isEmpty()) return;

        $usuarios = ['matios', 'taiwansea', 'natalia', 'n é o thierry', 'thigas', 'danitskkj', 'kaique', 'caio', 'ismael', 'enzo', 'gustavo', 'guh', 'cleber', 'iago', 'joao', 'çara', 'roberto'];

        $comentariosPorNota = [
            '5' => [
                // Comentários com diretor (15%)
                'diretor' => [
                    "{{diretor}} mais uma vez nos brinda com uma obra-prima absoluta!",
                    "{{diretor}} provou mais uma vez que é um gênio!",
                    "{{diretor}} conseguiu o impossível mais uma vez!",
                    "{{diretor}} não decepciona NUNCA!",
                    "{{diretor}} é um mestre!",
                    "{{diretor}} superou todas as expectativas!",
                    "{{diretor}} é um deus do cinema!",
                    "{{diretor}} redefiniu o que é um filme perfeito!",
                    "{{diretor}} é literalmente incapaz de fazer um filme ruim!",
                ],
                // Comentários com título (30%)
                'titulo' => [
                    "'{{titulo}}' é puro cinema!",
                    "'{{titulo}}' é o motivo pelo qual amamos cinema.",
                    "'{{titulo}}' é arte em movimento!",
                    "'{{titulo}}' vai ser estudado nas escolas de cinema!",
                    "'{{titulo}}' é um clássico instantâneo!",
                    "'{{titulo}}' mudou minha vida!",
                    "'{{titulo}}' é perfeição cinematográfica!",
                    "'{{titulo}}' é uma obra-prima!",
                    "'{{titulo}}' é simplesmente incrível!",
                    "'{{titulo}}' é o melhor filme que já vi!",
                ],
                // Comentários com filme e diretor (5%)
                'ambos' => [
                    "{{diretor}} fez história com '{{titulo}}'!",
                    "{{diretor}} entregou uma obra-prima com '{{titulo}}'!",
                    "{{diretor}} superou todas as expectativas com '{{titulo}}'!",
                ],
                // Comentários gerais (50%)
                'geral' => [
                    "Uma obra-prima absoluta!",
                    "Perfeição cinematográfica!",
                    "Cinco estrelas é pouco!",
                    "Impactante e emocionante!",
                    "Cinema puro!",
                    "Amei cada segundo!",
                    "Melhor filme da minha vida!",
                    "Absolutamente perfeito!",
                    "Sem palavras, apenas assistam!",
                    "Chorei de alegria!",
                    "Obra de arte!",
                    "Brilhante!",
                    "Espetacular!",
                    "Emocionante do início ao fim!",
                    "Incrível!",
                ]
            ],
            '4' => [
                'diretor' => [
                    "{{diretor}} quase acertou em cheio!",
                    "{{diretor}} superou minhas expectativas!",
                    "{{diretor}} entregou algo incrível!",
                    "{{diretor}} fez um bom trabalho!",
                    "{{diretor}} mantém a qualidade!",
                    "{{diretor}} conseguiu me entreter!",
                    "{{diretor}} acertou na mosca!",
                ],
                'titulo' => [
                    "'{{titulo}}' prende do início ao fim!",
                    "'{{titulo}}' é excelente!",
                    "'{{titulo}}' vale muito a pena!",
                    "'{{titulo}}' é muito bom!",
                    "'{{titulo}}' me surpreendeu!",
                    "'{{titulo}}' é ótimo!",
                    "'{{titulo}}' é recomendado!",
                    "'{{titulo}}' é diversão garantida!",
                    "'{{titulo}}' é um filmaço!",
                ],
                'ambos' => [
                    "{{diretor}} entregou diversão com '{{titulo}}'!",
                    "{{diretor}} acertou com '{{titulo}}'!",
                ],
                'geral' => [
                    "Excelente filme!",
                    "Muito bom!",
                    "Ótima direção!",
                    "Um filmaço!",
                    "Visualmente incrível!",
                    "Gostei bastante!",
                    "Recomendado!",
                    "Adorei!",
                    "Muito bom mesmo!",
                    "Quase perfeito!",
                    "Superou expectativas!",
                    "Vale a pena!",
                ]
            ],
            '3' => [
                'diretor' => [
                    "{{diretor}} fez um filme OK.",
                    "{{diretor}} já fez coisa melhor.",
                    "{{diretor}} numa pegada mais leve.",
                    "{{diretor}} mantém o padrão.",
                    "{{diretor}} tentou algo diferente.",
                    "{{diretor}} fez algo mediano.",
                ],
                'titulo' => [
                    "'{{titulo}}' é divertido para passar o tempo.",
                    "'{{titulo}}' cumpriu o que prometia.",
                    "'{{titulo}}' tem seus méritos.",
                    "'{{titulo}}' é interessante.",
                    "'{{titulo}}' é OK.",
                    "'{{titulo}}' quebra um galho.",
                    "'{{titulo}}' é assistível.",
                    "'{{titulo}}' é legal.",
                ],
                'ambos' => [
                    "{{diretor}} fez algo OK com '{{titulo}}'.",
                ],
                'geral' => [
                    "Bom filme para passar o tempo.",
                    "Tem seus méritos.",
                    "É um filme OK.",
                    "Legal.",
                    "Dá pra assistir.",
                    "Assistível.",
                    "Não é ruim.",
                    "Mediano.",
                    "OK.",
                    "Interessante.",
                    "Quebra um galho.",
                ]
            ],
            '2' => [
                'diretor' => [
                    "{{diretor}} não estava no seu dia.",
                    "{{diretor}} errou a mão.",
                    "{{diretor}} não acertou desta vez.",
                    "{{diretor}} já fez muito melhor.",
                    "{{diretor}} dormiu no ponto.",
                    "{{diretor}} pode fazer melhor.",
                ],
                'titulo' => [
                    "'{{titulo}}' é esquecível.",
                    "'{{titulo}}' decepcionou.",
                    "'{{titulo}}' não funcionou.",
                    "'{{titulo}}' é fraco.",
                    "'{{titulo}}' deixou a desejar.",
                    "'{{titulo}}' é passável.",
                    "'{{titulo}}' não convenceu.",
                ],
                'ambos' => [
                    "{{diretor}} decepcionou com '{{titulo}}'.",
                ],
                'geral' => [
                    "Meh.",
                    "Esquecível.",
                    "Que decepção.",
                    "Execução deixou a desejar.",
                    "Não funcionou pra mim.",
                    "Não gostei.",
                    "Passável.",
                    "Fraquinho.",
                    "Poderia ser melhor.",
                    "Não convenceu.",
                ]
            ],
            '1' => [
                'diretor' => [
                    "{{diretor}}, o que aconteceu?!",
                    "{{diretor}} teve um dia muito ruim.",
                    "{{diretor}} decepcionou MUITO.",
                    "{{diretor}} deveria pedir desculpas.",
                    "{{diretor}} atingiu o fundo do poço.",
                    "{{diretor}} me fez perder a fé no cinema.",
                ],
                'titulo' => [
                    "'{{titulo}}' é simplesmente ruim.",
                    "'{{titulo}}' é uma perda de tempo.",
                    "'{{titulo}}' é péssimo.",
                    "'{{titulo}}' é horrível.",
                    "'{{titulo}}' é lixo.",
                    "'{{titulo}}' é terrível.",
                    "'{{titulo}}' é um desastre.",
                ],
                'ambos' => [
                    "{{diretor}} fez um desastre com '{{titulo}}'.",
                ],
                'geral' => [
                    "Simplesmente ruim.",
                    "Uma perda de tempo.",
                    "Péssimo.",
                    "Horrível.",
                    "Lixo.",
                    "Como isso foi aprovado?",
                    "Terrível.",
                    "Não recomendo.",
                    "Decepcionante.",
                    "Ruim demais.",
                ]
            ],
        ];


        foreach ($filmes as $filme) {
            $numAvaliacoes = rand(3, 7);
            shuffle($usuarios);
            $usuariosDoFilme = array_slice($usuarios, 0, $numAvaliacoes);

            $chancePerfil = rand(1, 100);
            $perfilRecepcao = 'misto';
            if ($chancePerfil <= 45) {
                $perfilRecepcao = 'bom';
            } elseif ($chancePerfil <= 80) {
                $perfilRecepcao = 'misto';
            } else {
                $perfilRecepcao = 'ruim';
            }
            // Alguns filmes específicos têm maior chance de serem aclamados
            if (in_array($filme->titulo, ['Interestelar', 'Parasita', 'Pulp Fiction: Tempo de Violência', 'Carros']) && rand(1,10) > 3) {
                $perfilRecepcao = 'aclamado';
            }


            $localComentarios = $comentariosPorNota;

            foreach ($usuariosDoFilme as $usuario) {
                $comentario = null;
                $nota = 0;

                // 2. Gera a nota baseada no perfil de recepção
                switch ($perfilRecepcao) {
                    case 'aclamado':
                        $nota = (rand(1, 10) > 3) ? 5.0 : 4.5; // Maioria 5, com um ocasional 4.5
                        break;
                    case 'bom':
                        $nota = (rand(1, 10) > 5) ? (rand(40, 50) / 10) : (rand(30, 39) / 10); // Maioria 4-5, com um ocasional 3
                        break;
                    case 'misto':
                        $nota = rand(10, 45) / 10; // Notas entre 1.0 e 4.5
                        break;
                    case 'ruim':
                        $nota = (rand(1, 10) > 3) ? (rand(10, 25) / 10) : (rand(30, 40) / 10); // Maioria 1-2.5, com um "defensor" ocasional
                        break;
                }
                $nota = round($nota, 1);
                if ($nota > 5.0) $nota = 5.0;
                if ($nota < 0.5) $nota = 0.5;


                // 3. Escolhe um comentário baseado na distribuição desejada
                $comentario = null;
                $chanceComentario = rand(1, 100);
                
                if ($chanceComentario <= 20) {
                    // 20% sem comentário
                    $comentario = null;
                } else {
                    $keyCategoria = (string)round($nota);
                    if ($keyCategoria == 0) $keyCategoria = '1';

                    if (isset($localComentarios[$keyCategoria])) {
                        $chanceRestante = rand(1, 100);
                        
                        if ($chanceRestante <= 15) {
                            // 15% comentários com diretor
                            if (!empty($localComentarios[$keyCategoria]['diretor'])) {
                                $commentIndex = array_rand($localComentarios[$keyCategoria]['diretor']);
                                $comentario = $localComentarios[$keyCategoria]['diretor'][$commentIndex];
                                unset($localComentarios[$keyCategoria]['diretor'][$commentIndex]);
                            }
                        } elseif ($chanceRestante <= 45) {
                            // 30% comentários com título (15 + 30 = 45)
                            if (!empty($localComentarios[$keyCategoria]['titulo'])) {
                                $commentIndex = array_rand($localComentarios[$keyCategoria]['titulo']);
                                $comentario = $localComentarios[$keyCategoria]['titulo'][$commentIndex];
                                unset($localComentarios[$keyCategoria]['titulo'][$commentIndex]);
                            }
                        } elseif ($chanceRestante <= 50) {
                            // 5% comentários com filme e diretor (45 + 5 = 50)
                            if (!empty($localComentarios[$keyCategoria]['ambos'])) {
                                $commentIndex = array_rand($localComentarios[$keyCategoria]['ambos']);
                                $comentario = $localComentarios[$keyCategoria]['ambos'][$commentIndex];
                                unset($localComentarios[$keyCategoria]['ambos'][$commentIndex]);
                            }
                        } else {
                            // 50% comentários gerais (restante até 100%)
                            if (!empty($localComentarios[$keyCategoria]['geral'])) {
                                $commentIndex = array_rand($localComentarios[$keyCategoria]['geral']);
                                $comentario = $localComentarios[$keyCategoria]['geral'][$commentIndex];
                                unset($localComentarios[$keyCategoria]['geral'][$commentIndex]);
                            }
                        }
                    }
                }

                if ($comentario) {
                    $comentario = str_replace('{{titulo}}', $filme->titulo, $comentario);
                    $comentario = str_replace('{{diretor}}', $filme->diretor, $comentario);
                }

                Avaliacao::create([
                    'filme_id' => $filme->id,
                    'usuario' => $usuario,
                    'nota' => $nota,
                    'comentario' => $comentario,
                    'created_at' => Carbon::now()->subDays(rand(0, 1095))->subHours(rand(0, 23)),
                    'updated_at' => Carbon::now()->subDays(rand(0, 1095))->subHours(rand(0, 23)),
                ]);
            }
        }
    }
}
