@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <h1 class="mb-0 fw-bold">Catálogo</h1>
        <a href="{{ route('filmes.create') }}" class="btn btn-success btn-lg d-flex align-items-center gap-2" style="color: #fff; font-size: 1.08rem;">
            <i class="fas fa-plus"></i> <span>Adicionar Filme</span>
        </a>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('filmes.index') }}" class="row g-3 align-items-end">
                <div class="col-lg-4 col-md-12">
                    <label for="titulo" class="form-label">Buscar por título</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Ex: O Poderoso Chefão..." value="{{ request('titulo') }}">
                </div>
                <div class="col-lg-2 col-md-6">
                    <label for="genero_id" class="form-label">Gênero</label>
                    <select name="genero_id" id="genero_id" class="form-select">
                        <option value="">Todos</option>
                        @foreach ($generos as $genero)
                            <option value="{{ $genero->id }}" @selected(request('genero_id') == $genero->id)>
                                {{ $genero->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-1 col-md-3">
                    <label for="nota_min" class="form-label">Nota Mín.</label>
                    <select name="nota_min" id="nota_min" class="form-select">
                        <option value="">Qualquer</option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{$i}}" @selected(request('nota_min') == $i)>{{$i}} ★</option>
                        @endfor
                    </select>
                </div>
                 <div class="col-lg-1 col-md-3">
                    <label for="nota_max" class="form-label">Nota Máx.</label>
                    <select name="nota_max" id="nota_max" class="form-select">
                        <option value="">Qualquer</option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{$i}}" @selected(request('nota_max') == $i)>{{$i}} ★</option>
                        @endfor
                    </select>
                </div>
                <div class="col-lg-2 col-md-6">
                    <label for="sortBy" class="form-label">Ordenar por</label>
                    <select name="sortBy" id="sortBy" class="form-select">
                        <option value="titulo_asc" @selected(request('sortBy') == 'titulo_asc')>Título (A-Z)</option>
                        <option value="titulo_desc" @selected(request('sortBy') == 'titulo_desc')>Título (Z-A)</option>
                        <option value="avaliacoes_avg_nota_desc" @selected(request('sortBy') == 'avaliacoes_avg_nota_desc')>Maior Nota</option>
                        <option value="avaliacoes_avg_nota_asc" @selected(request('sortBy') == 'avaliacoes_avg_nota_asc')>Menor Nota</option>
                        <option value="ano_lancamento_desc" @selected(request('sortBy') == 'ano_lancamento_desc')>Mais Recentes</option>
                        <option value="ano_lancamento_asc" @selected(request('sortBy') == 'ano_lancamento_asc')>Mais Antigos</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-12 d-flex justify-content-end align-items-end gap-2">
                    <a href="{{ route('filmes.index') }}" class="btn btn-outline-light">Limpar</a>
                    <button type="submit" class="btn btn-success flex-grow-1" style="background-color: #00c94e; border-color: #00c94e; color: #fff; font-weight: 600;">Filtrar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-3">
        @forelse ($filmes as $filme)
            <div class="col">
                <div class="card bg-transparent border-0 movie-card h-100">
                    <a href="{{ route('filmes.show', $filme->id) }}" class="text-decoration-none d-flex flex-column h-100">
                        <div class="movie-poster-grid">
                            <img src="{{ $filme->poster_url }}" 
                                 loading="lazy"
                                 onerror="this.onerror=null;this.src='https://placehold.co/400x600/1f2428/e1e3e5?text={{ urlencode($filme->titulo) }}';"
                                 alt="Pôster de {{ $filme->titulo }}">
                        </div>
                        <div class="text-center py-2">
                            <h6 class="card-title text-light mb-0 text-truncate" title="{{ $filme->titulo }}">{{ $filme->titulo }}</h6>
                            <small class="text-muted">{{ $filme->ano_lancamento }}</small>
                        </div>
                    </a>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center py-5 px-3 mt-4 border border-2 border-dashed rounded" style="border-color: var(--border-color) !important;">
                     <i class="fas fa-film fa-3x text-muted mb-3"></i>
                     <h3 class="text-light fw-bold">Nenhum filme encontrado</h3>
                     <p class="text-muted mb-0">Tente ajustar os filtros ou <a href="{{ route('filmes.index') }}" class="text-decoration-none fw-semibold" style="color: var(--accent-color);">limpar a busca</a>.</p>
                </div>
            </div>
        @endforelse
    </div>
    @if ($filmes->hasPages())
        <div class="d-flex justify-content-center mt-5">
            <nav>
                <ul class="pagination pagination-lg justify-content-center">
                    @if ($filmes->onFirstPage())
                        <li class="page-item disabled"><span class="page-link bg-transparent border-0 text-white">&laquo;</span></li>
                    @else
                        <li class="page-item"><a class="page-link bg-transparent border-0 text-white" href="{{ $filmes->previousPageUrl() }}">&laquo;</a></li>
                    @endif
                    @foreach ($filmes->getUrlRange(1, $filmes->lastPage()) as $page => $url)
                        <li class="page-item @if($page == $filmes->currentPage()) active @endif">
                            <a class="page-link bg-transparent border-0 text-white" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                    @if ($filmes->hasMorePages())
                        <li class="page-item"><a class="page-link bg-transparent border-0 text-white" href="{{ $filmes->nextPageUrl() }}">&raquo;</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link bg-transparent border-0 text-white">&raquo;</span></li>
                    @endif
                </ul>
            </nav>
        </div>
    @endif
@endsection
