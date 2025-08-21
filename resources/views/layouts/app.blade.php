<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CritikBox 🎬</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/1828/1828884.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --dark-bg: #14181c;
            --card-bg: #1f2428;
            --border-color: #3a4147;
            --text-light: #e1e3e5;
            --text-muted: #8a939c;
            --star-color: #00e054; /* Verde estilo Letterboxd */
            --star-color-muted: #2c3440;
        }
        body { 
            background-color: var(--dark-bg); 
            color: var(--text-light); 
            font-family: 'Inter', sans-serif;
        }
        .navbar { 
            background-color: var(--card-bg) !important;
            border-bottom: 1px solid var(--border-color);
        }
        .card { 
            background-color: var(--card-bg); 
            border: 1px solid var(--border-color); 
        }
        .form-control, .form-select { 
            background-color: #2c3238; 
            color: var(--text-light); 
            border-color: var(--border-color); 
        }
        .form-control:focus, .form-select:focus { 
            background-color: #2c3238; 
            color: var(--text-light); 
            border-color: var(--star-color); 
            box-shadow: 0 0 0 0.2rem rgba(0, 224, 84, 0.25);
        }
        .movie-card:hover .movie-poster-grid {
            border-color: var(--star-color);
        }
        .movie-poster-grid {
            position: relative;
            padding-top: 150%; /* 2:3 ratio, bom para posters */
            background-color: #2c3238;
            border-radius: 0.5rem;
            overflow: hidden;
            border: 1.5px solid var(--border-color);
            transition: border-color .2s ease;
            min-height: 220px;
            max-height: 420px;
        }
        .movie-poster-grid img {
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0.5rem;
        }
        .movie-card {
            min-width: 160px;
            max-width: 100%;
            min-height: 320px;
            box-shadow: 0 2px 12px 0 rgba(0,0,0,0.10);
            border-radius: 0.7rem;
        }
        @media (max-width: 991px) {
            .movie-card { min-width: 140px; min-height: 260px; }
            .movie-poster-grid { min-height: 180px; }
        }
        @media (max-width: 767px) {
            .movie-card { min-width: 120px; min-height: 200px; }
            .movie-poster-grid { min-height: 120px; }
        }
        .card-body.text-center h6.card-title {
            font-size: 1.05rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }
        .card-body.text-center small {
            font-size: 0.95rem;
        }
        .star-rating-display {
            font-size: 1.25rem;
        }
        .star-rating-display.small {
            font-size: 1rem;
        }
        .average-rating-box .star-rating-display {
            font-size: 2rem;
        }
        .average-rating-box .rating-score {
            font-size: 1.1rem;
        }
        /* Ajuste para responsividade do container principal */
        main.container {
            max-width: 1200px;
            padding-left: 1rem;
            padding-right: 1rem;
        }
        @media (max-width: 575px) {
            main.container { padding-left: 0.3rem; padding-right: 0.3rem; }
        }
        .page-item.active .page-link {
            background-color: var(--star-color);
            border-color: var(--star-color);
            color: var(--dark-bg);
        }
        .page-link {
            background-color: var(--card-bg);
            border-color: var(--border-color);
            color: var(--text-light);
        }

        /* Sistema de Estrelas Interativo */
        .interactive-star-rating { display: flex; justify-content: flex-start; }
        .interactive-star-rating i {
            font-size: 2.5rem;
            color: var(--star-color-muted);
            cursor: pointer;
            transition: transform 0.1s ease-in-out, color 0.2s ease-in-out;
            padding-right: 8px;
        }
        .interactive-star-rating i:hover { transform: scale(1.2); }
        .interactive-star-rating i.star-filled,
        .interactive-star-rating i.star-half { color: var(--star-color); }

        /* Display de Estrelas (Não interativo) */
        .star-rating-display { color: var(--star-color); }
        .star-rating-display.small { font-size: 0.9rem; }
        .star-rating-display .far { color: var(--star-color-muted); }

        /* Bloco de Avaliação Média no Topo */
        .average-rating-box {
            text-align: center;
            flex-shrink: 0;
            margin-left: 2rem;
            max-width: 400px; 
        }
        .average-rating-box .star-rating-display {
            font-size: 2.2rem;
            line-height: 1;
            margin-bottom: 0.5rem;
        }
        .average-rating-box .rating-score {
            font-size: 1.2rem;
            font-weight: 600;
            line-height: 1;
            display: block;
            margin-bottom: 0.25rem;
        }
        .fa-film, .fa-pen, .fa-comments, .fa-edit, .fa-trash, .fa-plus, .fa-check {
            color: #fff !important;
        }
        .star-rating-display i,
        .star-rating-display .fas,
        .star-rating-display .fa-star,
        .star-rating-display .fa-star-half-alt {
            color: var(--star-color) !important;
        }
        .star-rating-display .far {
            color: var(--star-color-muted) !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/">⭐ CritikBox</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('filmes.index') }}">Filmes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('generos.index') }}">Gêneros</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container d-flex flex-column flex-grow-1">
        @yield('content')
    </main>
    <footer class="text-center text-muted py-4 mt-5">
        <p>&copy; {{ date('Y') }} CritikBox</p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>