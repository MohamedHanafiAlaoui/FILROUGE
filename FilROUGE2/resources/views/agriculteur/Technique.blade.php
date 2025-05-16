<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche Technique Tomate - AgriVision</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/agriculteur/Technique.css') }}">

</head>
<body>
    <!-- Sidebar Section -->
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

    <!-- Main Content Area -->
    <div class="main-content">
        <div class="header">
            <h1 class="dashboard-title">Fiche Technique: {{$fiche->name}}</h1>
            <div class="header-icons">
                <div class="header-icon">
                    <i class="fas fa-print"></i>
                </div>
                <div class="header-icon">
                    <i class="fas fa-share-alt"></i>
                </div>
            </div>
        </div>
        
        <!-- Tomato Hero Section -->
        <div class="tomato-hero">
            <img src="{{$fiche->image}}" 
                 alt="Champ de tomates" 
                 class="tomato-hero-image">
            <div class="tomato-hero-content">
                <h1 class="tomato-title">{{$fiche->name}} </h1>
                <!-- <div class="tomato-meta">
                    <div class="tomato-meta-item">
                        <i class="fas fa-seedling"></i> Cycle : 90-120 jours
                    </div>
                    <div class="tomato-meta-item">
                        <i class="fas fa-temperature-high"></i> Température : 18-25°C
                    </div>
                    <div class="tomato-meta-item">
                        <i class="fas fa-sun"></i> Ensoleillement : Plein soleil
                    </div>
                    <div class="tomato-meta-item">
                        <i class="fas fa-tint"></i> Arrosage : Régulier
                    </div>
                </div> -->
            </div>
        </div>
        

        
        <!-- Growth Stages -->
        <div class="growth-stages">
            <h2 class="section-title"><i class="fas fa-chart-line"></i> Étapes de Croissance</h2>
            
            @foreach ($etapes as $etape)
                        <div class="stage">
                <div class="stage-image" style="background-image: url('https://www.shutterstock.com/shutterstock/photos/354250250/display_1500/stock-vector-life-cycle-of-apple-tree-354250250.jpg');"></div>
                <div class="stage-content">
                    <h3 class="stage-title">
                        <span class="stage-icon"><i class="fas fa-seedling"></i></span>
                        {{$etape->nameetape}} <span class="stage-days">{{ $etape->duree_estimee }}</span>
                    </h3>
                    <p>{{ $etape->descriptionetape }}</p>
                </div>
            </div>
            @endforeach

            

        </div>
        
        <!-- Common Problems -->
        <div class="problems-section">
            <h2 class="section-title"><i class="fas fa-exclamation-triangle"></i> Problèmes Courants</h2>
            <div class="problems-grid">

            @foreach ($problems as $problem)

                <div class="problem-card">
                    <h4><i class="fas fa-bug"></i> Mildiou (Phytophthora infestans)</h4>
                    <div class="problem-symptoms">
                        <strong>Symptômes :</strong> {{ $problem ->symptoms   }}
                    </div>
                    <div class="problem-solution">
                        <strong>Solution :</strong>  {{ $problem ->solutions   }}
                    </div>
                </div>
                
            @endforeach
            </div>
        </div>
        

    </div>

    <script>
        // Add active class to menu items when clicked
        const menuItems = document.querySelectorAll('.menu-item');
        menuItems.forEach(item => {
            item.addEventListener('click', () => {
                menuItems.forEach(i => i.classList.remove('active'));
                item.classList.add('active');
            });
        });
        
        // Print functionality
        document.querySelector('.fa-print').closest('.header-icon').addEventListener('click', () => {
            window.print();
        });
        
        // Share functionality
        document.querySelector('.fa-share-alt').closest('.header-icon').addEventListener('click', () => {
            if (navigator.share) {
                navigator.share({
                    title: 'Fiche Technique Tomate - AgriVision',
                    text: 'Découvrez cette fiche technique complète sur la culture de la tomate',
                    url: window.location.href
                }).catch(err => {
                    console.log('Error sharing:', err);
                });
            } else {
                alert("La fonction de partage n'est pas disponible sur ce navigateur. Copiez le lien manuellement.");
            }
        });
        
        // Animation on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                }
            });
        }, { threshold: 0.1 });
        
        document.querySelectorAll('.stage, .detail-card, .problem-card').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>