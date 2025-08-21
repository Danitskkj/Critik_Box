@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold mb-0" style="font-size:2rem; letter-spacing:-0.5px;">Editar Gênero</h1>
    <a href="{{ route('generos.index') }}" class="btn btn-outline-light">Voltar</a>
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
<form action="{{ route('generos.update', $genero->id) }}" method="POST" class="card shadow-lg border-0 p-4 mx-auto" style="max-width: 420px; background: #23272b; border-radius: 1.2rem;">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nome" class="form-label fw-semibold">Nome do Gênero</label>
        <input type="text" name="nome" id="nome" class="form-control form-control-lg" value="{{ old('nome', $genero->nome) }}" required autofocus>
    </div>
    <button type="submit" class="btn btn-success w-100 py-2 fw-bold mb-2"><i class="fas fa-check me-1"></i>Atualizar</button>
</form>
@endsection