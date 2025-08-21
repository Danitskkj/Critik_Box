<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Genero;
use App\Models\Avaliacao;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    public function index(Request $request)
    {
        $query = Filme::withAvg('avaliacoes', 'nota');

        if ($request->filled('titulo')) {
            $query->where('titulo', 'like', '%' . $request->titulo . '%');
        }

        if ($request->filled('genero_id')) {
            $query->whereHas('generos', function ($q) use ($request) {
                $q->where('generos.id', $request->genero_id);
            });
        }

        $nota_min = $request->filled('nota_min') ? (float)$request->nota_min : null;
        $nota_max = $request->filled('nota_max') ? (float)$request->nota_max : null;

        if (!is_null($nota_min) || !is_null($nota_max)) {
            $min = $nota_min ?? 0;
            $max = $nota_max ?? 5;
            $query->havingBetween('avaliacoes_avg_nota', [$min, $max]);
        }

        $sortBy = $request->input('sortBy', 'titulo_asc');
        $sortOptions = [
            'titulo_asc' => ['titulo', 'asc'],
            'titulo_desc' => ['titulo', 'desc'],
            'avaliacoes_avg_nota_desc' => ['avaliacoes_avg_nota', 'desc'],
            'avaliacoes_avg_nota_asc' => ['avaliacoes_avg_nota', 'asc'],
            'ano_lancamento_desc' => ['ano_lancamento', 'desc'],
            'ano_lancamento_asc' => ['ano_lancamento', 'asc'],
        ];
        [$sortField, $sortDirection] = $sortOptions[$sortBy] ?? ['titulo', 'asc'];
        $query->orderBy($sortField, $sortDirection);

        $filmes = $query->paginate(18)->withQueryString();
        $generos = Genero::orderBy('nome')->get();

        return view('filmes.index', compact('filmes', 'generos'));
    }

    public function create()
    {
        $generos = Genero::orderBy('nome')->get();
        return view('filmes.create', compact('generos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'ano_lancamento' => 'required|integer|min:1888',
            'diretor' => 'nullable|string|max:255',
            'poster_url' => 'nullable|url|max:500',
            'generos' => 'required|array',
            'generos.*' => 'exists:generos,id'
        ]);

        $filme = Filme::create($request->only('titulo', 'ano_lancamento', 'sinopse', 'diretor', 'poster_url'));
        $filme->generos()->attach($request->generos);
        return redirect()->route('filmes.index')->with('success', 'Filme cadastrado com sucesso!');
    }

    public function show(Filme $filme)
    {
        $filme->load('avaliacoes', 'generos');
        return view('filmes.show', compact('filme'));
    }

    public function edit(Filme $filme)
    {
        $generos = Genero::orderBy('nome')->get();
        return view('filmes.edit', compact('filme', 'generos'));
    }

    public function update(Request $request, Filme $filme)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'ano_lancamento' => 'required|integer|min:1888',
            'diretor' => 'nullable|string|max:255',
            'poster_url' => 'nullable|url|max:500',
            'generos' => 'required|array'
        ]);

        $filme->update($request->only('titulo', 'ano_lancamento', 'sinopse', 'diretor', 'poster_url'));
        $filme->generos()->sync($request->generos);
        return redirect()->route('filmes.show', $filme->id)->with('success', 'Filme atualizado com sucesso!');
    }

    public function destroy(Filme $filme)
    {
        $filme->delete();
        return redirect()->route('filmes.index')->with('success', 'Filme excluído com sucesso!');
    }

    public function avaliar(Request $request, Filme $filme)
    {
        $request->validate([
            'nota' => 'required|numeric|min:0.5|max:5',
            'usuario' => 'required|string|max:255',
            'comentario' => 'nullable|string',
        ]);

        $avaliacao = new Avaliacao();
        $avaliacao->nota = $request->nota;
        $avaliacao->usuario = $request->usuario;
        $avaliacao->comentario = $request->comentario;

        $filme->avaliacoes()->save($avaliacao);

        return redirect()->route('filmes.show', $filme)->with('success', 'Avaliação adicionada com sucesso!');
    }
}
