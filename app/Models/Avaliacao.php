<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $table = 'avaliacoes';

    protected $fillable = ['filme_id', 'usuario', 'nota', 'comentario'];

    public function filme()
    {
        return $this->belongsTo(Filme::class);
    }
}