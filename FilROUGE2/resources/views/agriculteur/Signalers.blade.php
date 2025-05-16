<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriVision - Fiches Signalements</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/agriculteur/Signalers.css') }}">


</head>

<body>
<div class="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-title">AgriVision</div>
            <div class="sidebar-subtitle">Gestion des cultures</div>
        </div>
        <div class="sidebar-menu">

            <a class="menu-item" href="{{ route('agriculteur.Calendrier') }}">
                <div class="menu-icon"><i class="fas fa-leaf"></i></div>
                <span class="menu-text">Cultures</span>
            </a>

            <a class="menu-item active" href="{{ route('signalers.index') }}">
                <div class="menu-icon"><i class="fas fa-binoculars"></i></div>
                <span class="menu-text">Surveillance</span>
            </a>

            <a class="menu-item " href="{{ route('user') }}">
                <div class="menu-icon"><i class="fas fa-envelope"></i></div>
                <span class="menu-text">Messages</span>
            </a>
            <a class="menu-item " href="{{ route('agriculteur.FichesExplicatives') }}">
                <div class="menu-icon"><i class="fas fa-file-alt"></i></div>
                <span class="menu-text">Fiches Explicatives</span>
            </a>
            <div class="menu-item">

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button style="background: none;width: 100%;border: none;display: flex;color: white;}" type="submit">
                        <div class="menu-icon"><i class="fas fa-sign-out-alt"></i></div>
                        <span class="menu-text">Paramètres</span>
                    </button>
                </form>

            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="top-section">
            <div class="page-header">
                <h1 class="page-title">Fiches Signalements</h1>
                <div class="search-container">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" id="searchInput" class="search-input"
                        placeholder="Rechercher des signalements...">
                </div>
            </div>
        </div>

        <div class="signalements-container" id="signalementsContainer">
            <!-- Signalement Card 1 -->
            @foreach ($signalers as $signaler)
                <div class="signalement-card" data-search="mildiou tomates feuilles taches brunes">
                    <div class="signalement-header">
                    <img src="{{ Str::startsWith($signaler->image, ['http', 'https']) ? $signaler->image : asset('storage/' . $signaler->image) }}" alt="Problème de mildiou" class="signalement-image">

                        <div class="signalement-status">Non résolu</div>
                    </div>
                    <div class="signalement-content">
                        <h3 class="signalement-title">{{$signaler->name}}</h3>
                        <div class="signalement-meta">
                            <span class="signalement-date"><i class="far fa-calendar-alt"></i> {{ $signaler->created_at->format('d/m/Y') }}</span>
                            <span class="signalement-culture"><i class="fas fa-leaf"></i> Tomates</span>
                        </div>
                        <p class="signalement-description">
                            {{$signaler->description}}
                        </p>
                        <div class="signalement-actions">
                            <a href="{{ route('signaler.show', $signaler->id) }}" class="view-btn">
                                <i class="fas fa-eye"></i> Voir détails
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>

        <!-- Pagination -->
        <ul class="pagination">
            {{-- Previous Page Link --}}
            <li class="page-item {{ $signalers->onFirstPage() ? 'disabled' : '' }}">
                <a href="{{ $signalers->previousPageUrl() ?? '#' }}" class="page-link">
                    <i class="fas fa-chevron-left"></i>
                </a>
            </li>

            {{-- Page Number Links --}}
            @for ($i = 1; $i <= $signalers->lastPage(); $i++)
                <li class="page-item {{ $i == $signalers->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $signalers->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            {{-- Next Page Link --}}
            <li class="page-item {{ !$signalers->hasMorePages() ? 'disabled' : '' }}">
                <a href="{{ $signalers->nextPageUrl() ?? '#' }}" class="page-link">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </li>
        </ul>



    </div>





    <script>


    </script>
</body>

</html>