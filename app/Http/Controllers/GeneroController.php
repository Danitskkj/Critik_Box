<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function index()
    {
        $generos = Genero::orderBy('nome')->paginate(10);
        return view('generos.index', compact('generos'));
    }

    public function create()
    {
        return view('generos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:generos'
        ]);

        Genero::create($request->all());

        return redirect()->route('generos.index')->with('success', 'Gênero criado com sucesso!');
    }
    
    public function show(Genero $genero)
    {
        $filmes = $genero->filmes()->withAvg('avaliacoes', 'nota')->orderBy('titulo')->get();
        return view('generos.show', compact('genero', 'filmes'));
    }

    public function edit(Genero $genero)
    {
        return view('generos.edit', compact('genero'));
    }

    public function update(Request $request, Genero $genero)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:generos,nome,' . $genero->id
        ]);

        $genero->update($request->all());

        return redirect()->route('generos.index')->with('success', 'Gênero atualizado com sucesso!');
    }

    public function destroy(Genero $genero)
    {
        $genero->delete();
        return redirect()->route('generos.index')->with('success', 'Gênero excluído com sucesso!');
    }
}