@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h1 class="fw-bold mb-1" style="font-size:2rem; letter-spacing:-0.5px;">{{ $genero->nome }}</h1>
        <p class="text-muted mb-0">{{ $filmes->count() }} {{ $filmes->count() == 1 ? 'filme' : 'filmes' }} encontrado{{ $filmes->count() == 1 ? '' : 's' }}</p>
    </div>
    <a href="{{ route('generos.index') }}" class="btn btn-secondary px-4 py-2 fw-semibold d-flex align-items-center gap-2" style="color: #fff; font-size: 1.08rem;">
        <i class="fas fa-arrow-left"></i> <span>Voltar</span>
    </a>
</div>

@if($filmes->count() > 0)
    <div class="row">
        @foreach($filmes as $filme)
            <div class="col-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                <div class="card bg-transparent border-0 h-100">
                    <a href="{{ route('filmes.show', $filme->id) }}" class="text-decoration-none">
                        <div class="movie-poster-grid mb-2">
                            <img src="{{ $filme->poster_url }}" 
                                 onerror="this.onerror=null;this.src='https://placehold.co/400x600/14181c/e1e3e5?text={{ urlencode($filme->titulo) }}';"
                                 class="img-fluid rounded" 
                                 alt="Pôster de {{ $filme->titulo }}"
                                 style="transition: transform 0.2s ease-in-out;"
                                 onmouseover="this.style.transform='scale(1.05)'"
                                 onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <div class="card-body p-0">
                            <h6 class="card-title text-light mb-1 fw-semibold" style="font-size: 0.95rem; line-height: 1.2;">
                                {{ $filme->titulo }}
                            </h6>
                            <p class="card-text text-muted small mb-1">{{ $filme->ano_lancamento }}</p>
                            @if($filme->avaliacoes_avg_nota)
                                <div class="d-flex align-items-center gap-1">
                                    <div class="star-rating-display small">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($filme->avaliacoes_avg_nota >= $i)
                                                <i class="fas fa-star"></i>
                                            @elseif ($filme->avaliacoes_avg_nota >= $i - 0.5)
                                                <i class="fas fa-star-half-alt"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <span class="text-light small">{{ number_format($filme->avaliacoes_avg_nota, 1, ',') }}</span>
                                </div>
                            @else
                                <div class="text-muted small">Sem avaliações</div>
                            @endif
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="text-center p-4 border rounded border-secondary">
        <i class="fas fa-film fa-3x text-muted mb-3"></i>
        <h5 class="text-muted mb-2">Nenhum filme encontrado</h5>
        <p class="text-muted mb-0">Não há filmes cadastrados neste gênero ainda.</p>
    </div>
@endif
@endsection

<style>
.movie-poster-grid img {
    width: 100%;
    height: auto;
    aspect-ratio: 2/3;
    object-fit: cover;
}

.card:hover .card-title {
    color: #fff !important;
}

.star-rating-display i {
    color: #ffd700;
}
</style>
