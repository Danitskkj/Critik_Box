<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;
    protected $fillable = ['nome'];

    public function filmes()
    {
        return $this->belongsToMany(Filme::class, 'filme_genero');
    }
}