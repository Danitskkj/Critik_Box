@extends('layouts.app')

@section('content')
<div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 60vh;">
    <h1 class="display-3 fw-bold mb-4 text-center" style="letter-spacing: -1px;">Bem-vindo ao <span style="color: var(--star-color);">CritikBox</span> ⭐</h1>
    <a href="{{ route('filmes.index') }}" class="btn btn-success btn-lg px-5 py-3 fw-semibold d-flex align-items-center gap-2" style="font-size:1.3rem;">
        <i class="fas fa-film"></i> Explorar Catálogo
    </a>
</div>
@endsection