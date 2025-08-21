@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold mb-0" style="font-size:2rem; letter-spacing:-0.5px;">Adicionar Filme</h1>
    <a href="{{ route('filmes.index') }}" class="btn btn-outline-light">Voltar</a>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('filmes.store') }}" method="POST" class="card shadow-lg border-0 p-4 mx-auto" style="max-width: 600px; background: #23272b; border-radius: 1.2rem;">
    @csrf
    <div class="mb-3">
        <label for="titulo" class="form-label fw-semibold">Título</label>
        <input type="text" name="titulo" id="titulo" class="form-control form-control-lg" value="{{ old('titulo') }}" required autofocus>
    </div>
    <div class="mb-3">
        <label for="diretor" class="form-label fw-semibold">Diretor</label>
        <input type="text" name="diretor" id="diretor" class="form-control" value="{{ old('diretor') }}" placeholder="Nome do diretor">
    </div>
    <div class="mb-3">
        <label for="poster_url" class="form-label fw-semibold">URL do Pôster</label>
        <input type="url" name="poster_url" id="poster_url" class="form-control" value="{{ old('poster_url') }}" placeholder="https://exemplo.com/poster.jpg">
    </div>
    <div class="mb-3">
        <label for="ano_lancamento" class="form-label fw-semibold">Ano de Lançamento</label>
        <input type="number" name="ano_lancamento" id="ano_lancamento" class="form-control" value="{{ old('ano_lancamento') }}" required>
    </div>
    <div class="mb-3">
        <label for="generos" class="form-label fw-semibold">Gêneros</label>
        <select name="generos[]" id="generos" class="form-select" multiple required>
            @foreach ($generos as $genero)
                <option value="{{ $genero->id }}">{{ $genero->nome }}</option>
            @endforeach
        </select>
        <div class="form-text">Segure Ctrl ou Shift para selecionar mais de um gênero.</div>
    </div>
    <div class="mb-3">
        <label for="sinopse" class="form-label fw-semibold">Sinopse</label>
        <textarea name="sinopse" id="sinopse" class="form-control" rows="4">{{ old('sinopse') }}</textarea>
    </div>
    <button type="submit" class="btn btn-success w-100 py-2 fw-bold mb-2"><i class="fas fa-check me-1"></i>Salvar Filme</button>
</form>
@endsection
