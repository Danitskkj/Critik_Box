<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'sinopse', 'ano_lancamento', 'diretor', 'poster_url'];

    public function generos()
    {
        return $this->belongsToMany(Genero::class, 'filme_genero');
    }

    public function avaliacoes()
    {
        return $this->hasMany(Avaliacao::class);
    }

    // Helper para calcular a média de notas
    public function notaMedia()
    {
        // Retorna a média da coluna 'nota' ou 0 se não houver avaliações
        return $this->avaliacoes()->avg('nota') ?? 0;
    }
}