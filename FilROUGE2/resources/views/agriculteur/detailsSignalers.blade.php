<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriVision - Détails du Signalement</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/agriculteur/detailsSignalers.css') }}">

</head>

<body>
    <!-- Sidebar Navigation -->
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

            <a class="menu-item" href="{{ route('signalers.index') }}">
                <div class="menu-icon"><i class="fas fa-binoculars"></i></div>
                <span class="menu-text">Surveillance</span>
            </a>

            <a class="menu-item active" href="{{ route('user') }}">
                <div class="menu-icon"><i class="fas fa-envelope"></i></div>
                <span class="menu-text">Messages</span>
            </a>
            <a class="menu-item " href="{{ route('agriculteur.FichesExplicatives') }}">
                <div class="menu-icon"><i class="fas fa-file-alt"></i></div>
                <span class="menu-text">Fiches Explicatives</span>
            </a>
            <div class="menu-item">
                <div class="menu-icon"><i class="fas fa-cog"></i></div>
                <span class="menu-text">Paramètres</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">

        <!-- Report Card with Slider -->
        <div class="report-card">
            <div class="slider-container">
                <div class="slider" id="slider">
                    <div class="slide">
                        <img src="{{ $signaler->image }}" alt="{{ $signaler->name }}">
                    </div>

                </div>
                

                
                <div class="slider-dots" id="sliderDots">
                    <div class="dot active"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                </div>
            </div>
            
            <div class="report-content">
                <h1 class="report-title">{{ $signaler->name }}</h1>
                <p class="report-description">{{ $signaler->description }}</p>
            </div>
        </div>

        <!-- Comments Section -->
        <div class="comments-section">
            <h2 class="section-title">Commentaires</h2>
            
            <div class="comment-list" id="commentList">
                <!-- Comment 1 -->
                <div class="comment-item">
                    <div class="comment-avatar">JD</div>
                    <div class="comment-content">
                        <div class="comment-header">
                            <span class="comment-author">Jean Dupont</span>
                            <span class="comment-date">15/06/2023 10:30</span>
                        </div>
                        <p class="comment-text">
                            Il s'agit probablement d'une attaque de mildiou. Je recommande un traitement fongicide à base de cuivre.
                        </p>
                    </div>
                </div>
                
                <!-- Comment 2 -->
                <div class="comment-item">
                    <div class="comment-avatar">MT</div>
                    <div class="comment-content">
                        <div class="comment-header">
                            <span class="comment-author">Marie Tremblay</span>
                            <span class="comment-date">14/06/2023 16:45</span>
                        </div>
                        <p class="comment-text">
                            J'ai observé le même problème dans la parcelle B12. Nous devrions isoler les plants affectés.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Comment Form -->
            <div class="comment-form">
                <h3 class="section-title">Ajouter un commentaire</h3>
                <form id="commentForm">
                    <div class="form-group">
                        <label for="comment" class="form-label">Votre message</label>
                        <textarea id="comment" class="form-textarea" required placeholder="Saisissez votre commentaire..."></textarea>
                    </div>
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-paper-plane"></i> Publier
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>

            

    </script>
</body>

</html>