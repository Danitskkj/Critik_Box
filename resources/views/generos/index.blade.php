@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <h1 class="fw-bold mb-0" style="font-size:2rem; letter-spacing:-0.5px;">Gêneros</h1>
    <a href="{{ route('generos.create') }}" class="btn btn-success px-4 py-2 fw-semibold d-flex align-items-center gap-2" style="color: #fff; font-size: 1.08rem;">
        <i class="fas fa-plus"></i> <span>Adicionar Gênero</span>
    </a>
</div>
@if (session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
@endif
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body p-0">
        <table class="table table-dark table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th style="width:50%">Nome</th>
                    <th class="text-end" style="width:50%">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($generos as $genero)
                <tr>
                    <td class="fw-semibold" style="font-size:1.08rem;">{{ $genero->nome }}</td>
                    <td class="text-end">
                        <a href="{{ route('generos.show', $genero->id) }}" class="btn btn-info btn-sm fw-semibold me-1 px-3 d-inline-flex align-items-center gap-1" style="color: #fff; font-size: 1.02rem;">
                            <i class="fas fa-eye"></i> Visualizar
                        </a>
                        <a href="{{ route('generos.edit', $genero->id) }}" class="btn btn-warning btn-sm fw-semibold me-1 px-3 d-inline-flex align-items-center gap-1" style="color: #fff; font-size: 1.02rem;">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('generos.destroy', $genero->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Atenção! Excluir um gênero também o removerá de todos os filmes associados. Deseja continuar?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm fw-semibold px-3 d-inline-flex align-items-center gap-1" style="color: #fff; font-size: 1.02rem;"><i class="fas fa-trash"></i> Excluir</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="2" class="text-center text-muted py-4">Nenhum gênero cadastrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@if ($generos->hasPages())
    <div class="d-flex justify-content-center mt-4">
        <nav>
            <ul class="pagination pagination-lg justify-content-center">
                @if ($generos->onFirstPage())
                    <li class="page-item disabled"><span class="page-link bg-transparent border-0 text-white">&laquo;</span></li>
                @else
                    <li class="page-item"><a class="page-link bg-transparent border-0 text-white" href="{{ $generos->previousPageUrl() }}">&laquo;</a></li>
                @endif
                @foreach ($generos->getUrlRange(1, $generos->lastPage()) as $page => $url)
                    <li class="page-item @if($page == $generos->currentPage()) active @endif">
                        <a class="page-link bg-transparent border-0 text-white" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach
                @if ($generos->hasMorePages())
                    <li class="page-item"><a class="page-link bg-transparent border-0 text-white" href="{{ $generos->nextPageUrl() }}">&raquo;</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link bg-transparent border-0 text-white">&raquo;</span></li>
                @endif
            </ul>
        </nav>
    </div>
@endif
@endsection