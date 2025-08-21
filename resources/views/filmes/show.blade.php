@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4 col-lg-3">
        <div class="card bg-transparent border-0">
            <div class="movie-poster-grid mb-3">
                <img src="{{ $filme->poster_url }}" 
                     onerror="this.onerror=null;this.src='https://placehold.co/400x600/14181c/e1e3e5?text={{ urlencode($filme->titulo) }}';"
                     class="img-fluid rounded" 
                     alt="Pôster de {{ $filme->titulo }}">
            </div>
            <a href="{{ route('filmes.edit', $filme->id) }}" class="btn btn-outline-light mb-2">Editar Filme</a>
            <form action="{{ route('filmes.destroy', $filme->id) }}" method="POST" class="d-inline w-100" onsubmit="return confirm('Tem certeza que deseja excluir este filme? Esta ação não pode ser desfeita e todas as avaliações serão perdidas.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger w-100">Excluir Filme</button>
            </form>
        </div>
    </div>

    <div class="col-md-8 col-lg-9">
        <div class="d-flex flex-column gap-2 mb-3">
            <div class="d-flex flex-row align-items-center justify-content-between mb-2 gap-2 flex-wrap">
                <div class="d-flex align-items-center flex-wrap gap-2">
                    <h1 class="mb-0 me-2 fw-bold" style="line-height: 1.1; font-size: 2.1rem; letter-spacing: -0.5px;">{{ $filme->titulo }}</h1>
                    <span class="lead text-muted mb-0" style="font-size: 1.15rem;">{{ $filme->ano_lancamento }}</span>
                </div>
                <div class="average-rating-box ms-2 text-end d-flex align-items-center gap-2" style="min-width: 120px;">
                    <span class="rating-score fw-semibold text-light" style="font-size: 1.15rem; min-width: 2.2em; text-align: right; letter-spacing: -0.5px;">{{ number_format($filme->notaMedia(), 1, ',') }}</span>
                    <div class="star-rating-display" style="font-size: 1.15rem;">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($filme->notaMedia() >= $i)
                                <i class="fas fa-star"></i>
                            @elseif ($filme->notaMedia() >= $i - 0.5)
                                <i class="fas fa-star-half-alt"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </div>
                </div>
            </div>
            @if($filme->diretor)
                <div class="mb-2" style="font-family: 'Inter', 'Segoe UI', Arial, sans-serif; font-size: 1.08rem; color: #b5c7e6; font-weight: 500; letter-spacing: -0.2px;">
                    Direção: <span style="font-style: italic; color: #fff;">{{ $filme->diretor }}</span>
                </div>
            @endif
            <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                @foreach($filme->generos as $genero)
                    <span class="badge rounded-pill text-bg-secondary fw-normal px-3 py-2" style="font-size: 1rem;">{{ $genero->nome }}</span>
                @endforeach
            </div>
        </div>

        <p class="lead mb-4" style="font-size: 1rem; color: var(--text-light);">{{ $filme->sinopse ?? 'Sinopse não disponível.' }}</p>

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="mb-3">Adicionar uma Crítica</h5>
                <form action="{{ route('filmes.avaliar', $filme->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="nota" id="ratingValue" required>
                    <div class="interactive-star-rating mb-3">
                        <i class="far fa-star" data-value="1"></i>
                        <i class="far fa-star" data-value="2"></i>
                        <i class="far fa-star" data-value="3"></i>
                        <i class="far fa-star" data-value="4"></i>
                        <i class="far fa-star" data-value="5"></i>
                    </div>
                    <input type="text" name="usuario" class="form-control mb-2" placeholder="Seu nome" required>
                    <textarea name="comentario" class="form-control" placeholder="Seu comentário (opcional)..." rows="2"></textarea>
                    <button type="submit" class="btn btn-success mt-2 w-100">Salvar Crítica</button>
                </form>
            </div>
        </div>
        
        <h4 class="mt-5 mb-3" id="reviews">Críticas</h4>
        @forelse($filme->avaliacoes->sortByDesc('created_at') as $avaliacao)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <strong class="me-2">{{ $avaliacao->usuario }}</strong>
                        <div class="star-rating-display small">
                            @for ($i = 1; $i <= 5; $i++)
                               @if ($avaliacao->nota >= $i) <i class="fas fa-star"></i>
                               @elseif ($avaliacao->nota >= $i - 0.5) <i class="fas fa-star-half-alt"></i>
                               @else <i class="far fa-star"></i>
                               @endif
                           @endfor
                        </div>
                    </div>
                    @if($avaliacao->comentario)
                        <p class="mb-1 fst-italic">"{{ $avaliacao->comentario }}"</p>
                    @endif
                    <small class="text-muted">{{ $avaliacao->created_at->diffForHumans() }}</small>
                </div>
            </div>
        @empty
            <div class="text-center p-4 border rounded border-secondary">
                <p class="text-muted mb-0">Seja o primeiro a deixar uma crítica para este filme!</p>
            </div>
        @endforelse
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.interactive-star-rating i');
    const ratingValueField = document.getElementById('ratingValue');
    let currentRating = 0;

    function updateStars(rating) {
        stars.forEach(star => {
            const starValue = parseFloat(star.dataset.value);
            if (rating >= starValue) {
                star.className = 'fas fa-star star-filled';
            } else if (rating >= starValue - 0.5) {
                star.className = 'fas fa-star-half-alt star-half';
            } else {
                star.className = 'far fa-star';
            }
        });
    }

    stars.forEach(star => {
        star.addEventListener('click', function (e) {
            const starValue = parseFloat(this.dataset.value);
            const rect = this.getBoundingClientRect();
            const clickX = e.clientX - rect.left;
            const isHalf = clickX < rect.width / 2;
            let newRating = isHalf ? starValue - 0.5 : starValue;

            currentRating = (currentRating === newRating) ? 0 : newRating;

            ratingValueField.value = currentRating;
            updateStars(currentRating);
        });

        star.addEventListener('mousemove', function (e) {
            const hoverValue = parseFloat(this.dataset.value);
            const rect = this.getBoundingClientRect();
            const hoverX = e.clientX - rect.left;
            
            updateStars(hoverX < rect.width / 2 ? hoverValue - 0.5 : hoverValue);
        });
    });

    document.querySelector('.interactive-star-rating').addEventListener('mouseleave', function () {
        updateStars(currentRating);
    });

    const form = document.querySelector('form[action*="avaliar"]');
    if (form) {
        form.addEventListener('submit', function (e) {
            if (!ratingValueField.value || parseFloat(ratingValueField.value) < 0.5) {
                e.preventDefault();
                let msg = document.getElementById('nota-minima-msg');
                if (!msg) {
                    msg = document.createElement('div');
                    msg.id = 'nota-minima-msg';
                    msg.className = 'alert alert-warning mt-2';
                    msg.innerText = 'Nota mínima permitida: 0.5 estrela.';
                    form.prepend(msg);
                }
            } else {
                let msg = document.getElementById('nota-minima-msg');
                if (msg) msg.remove();
            }
        });
    }
});
</script>
@endpush