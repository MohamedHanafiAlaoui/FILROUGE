<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services Agricoles</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/app.css">
    

</head>
<body>

<header class="header">
        <div class="top-bar">
            <div class="location">
                <i class="fas fa-map-marker-alt"></i>
                Avenue Mohammed V, Rabat, Maroc
            </div>
            <div class="contact-info">
                <a href="mailto:contact@agrisupport.ma">
                    <i class="fas fa-envelope"></i>
                    contact@agrisupport.ma
                </a>
                <a href="tel:+212123456789">
                    <i class="fas fa-phone-alt"></i>
                    +212 12 34 56 78
                </a>
            </div>
        </div>
    </header>


    <div class="nav-container">
        <nav>
            <div class="logo">
                <i class="fas fa-leaf"></i>
                AgriSupport
            </div>
            <button class="menu-toggle" id="menuToggle">
                <i class="fas fa-bars"></i>
            </button>
            <div class="nav-links" id="navLinks">
                <a href="#home">
                    <i class="fas fa-home"></i>
                    HOME
                </a>
                <a href="#services">
                    <i class="fas fa-tools"></i>
                    SERVICES
                </a>
                <a href="#about">
                    <i class="fas fa-info-circle"></i>
                    ABOUT
                </a>
                <a href="#contact">
                    <i class="fas fa-envelope"></i>
                    CONTACT US
                </a>
            </div>
            <a href="/Connexion" class="btn-login" onclick="route(event)">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
        </nav>
    </div>


    <section class="hero" id="home">
        <div class="hero-overlay"></div>
        <div class="green-pattern">
            <!-- Dynamically generated squares for the pattern -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const pattern = document.querySelector('.green-pattern');
                    // Adjust number of squares based on screen width
                    const squaresCount = window.innerWidth > 768 ? 500 : 600;
                    
                    for (let i = 0; i < squaresCount; i++) {
                        const square = document.createElement('div');
                        square.classList.add('green-square');
                        square.style.transform = `rotate(${Math.random() *90}deg)`;
                        pattern.appendChild(square);
                    }
                    
                    // Mobile menu toggle
                    const menuToggle = document.getElementById('menuToggle');
                    const navLinks = document.getElementById('navLinks');
                    
                    menuToggle.addEventListener('click', function() {
                        navLinks.classList.toggle('active');
                    });
                });
            </script>
        </div>
        <div class="hero-content">
            <div class="hero-main">
                <h1 style="font-size: 2.5rem; margin-bottom: 20px;">AgriSupport</h1>
                <p class="hero-text">
                    Nous apportons un soutien aux agriculteurs en leur fournissant des conseils et des informations pratiques pour améliorer l'efficacité et la qualité de leur travail quotidien.
                </p>
            </div>
            
            <!-- Features Inside Hero Section -->
            <div class="hero-features">
                <div class="hero-feature">
                    <i class="fas fa-seedling hero-feature-icon"></i>
                    <h3 class="hero-feature-title">Suivi des cultures</h3>
                    <p class="hero-feature-desc">Surveillance complète de vos cultures à chaque étape de croissance avec notifications et alertes personnalisées.</p>
                </div>
                <div class="hero-feature active">
                    <i class="fas fa-diagnoses hero-feature-icon"></i>
                    <h3 class="hero-feature-title">Diagnostic intelligent</h3>
                    <p class="hero-feature-desc">Identification rapide des problèmes agricoles avec solutions adaptées et recommandations d'experts.</p>
                </div>
                <div class="hero-feature">
                    <i class="fas fa-chart-line hero-feature-icon"></i>
                    <h3 class="hero-feature-title">Analyses avancées</h3>
                    <p class="hero-feature-desc">Données et statistiques précises pour optimiser votre productivité et vos rendements.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="services">
        <div class="container">
            <h2 class="section-title">
                <i class="fas fa-tools"></i>
                NOS SERVICES
            </h2>
            <div class="services-grid">
                <div class="service-card">
                    <h3><i class="fas fa-tasks"></i> Gestion des cultures</h3>
                    <ul>
                        <li><i class="fas fa-check"></i> Planification des plantations</li>
                        <li><i class="fas fa-check"></i> Suivi du cycle de croissance</li>
                        <li><i class="fas fa-check"></i> Rappels pour les interventions</li>
                        <li><i class="fas fa-check"></i> Historique des activités</li>
                    </ul>
                </div>
                <div class="service-card">
                    <h3><i class="fas fa-bug"></i> Protection des plantes</h3>
                    <ul>
                        <li><i class="fas fa-check"></i> Identification des maladies</li>
                        <li><i class="fas fa-check"></i> Détection des parasites</li>
                        <li><i class="fas fa-check"></i> Recommandations de traitement</li>
                        <li><i class="fas fa-check"></i> Prévention des problèmes</li>
                    </ul>
                </div>
                <div class="service-card">
                    <h3><i class="fas fa-user-tie"></i> Conseil expert</h3>
                    <ul>
                        <li><i class="fas fa-check"></i> Accès à des agronomes</li>
                        <li><i class="fas fa-check"></i> Analyses personnalisées</li>
                        <li><i class="fas fa-check"></i> Recommandations spécifiques</li>
                        <li><i class="fas fa-check"></i> Support technique</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section about" id="about">
        <div class="container">
            <h2 class="section-title">
                <i class="fas fa-info-circle"></i>
                À PROPOS
            </h2>
            <div class="about-content">
                <div class="about-text">
                    <p class="about-description">
                        AgriSupport est une plateforme innovante dédiée aux agriculteurs modernes. Notre mission est de fournir des outils technologiques accessibles pour optimiser la gestion des exploitations agricoles.
                    </p>
                    <p class="about-description">
                        Fondée en 2020 par une équipe d'agronomes et de technologues, notre application combine expertise agricole et solutions numériques pour accompagner les producteurs à chaque étape de leur travail.
                    </p>
                    <p class="about-description">
                        Nous croyons en une agriculture durable, productive et respectueuse de l'environnement, et nous mettons tout en œuvre pour faciliter cette transition.
                    </p>
                </div>
                <div class="about-image">
                    <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Équipe AgriSupport">
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-column">
                <h3>
                    <i class="fas fa-info-circle"></i>
                    À propos
                </h3>
                <p>AgriSupport révolutionne l'agriculture grâce à des solutions technologiques innovantes pour une meilleure productivité et durabilité.</p>
                <div class="social-icons">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
            
            <div class="footer-column">
                <h3>
                    <i class="fas fa-link"></i>
                    Liens rapides
                </h3>
                <ul>
                    <li>
                        <i class="fas fa-chevron-right"></i>
                        <a href="#home">Accueil</a>
                    </li>
                    <li>
                        <i class="fas fa-chevron-right"></i>
                        <a href="#services">Services</a>
                    </li>
                    <li>
                        <i class="fas fa-chevron-right"></i>
                        <a href="#about">À propos</a>
                    </li>
                    <li>
                        <i class="fas fa-chevron-right"></i>
                        <a href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            
            <div class="footer-column">
                <h3>
                    <i class="fas fa-tools"></i>
                    Services
                </h3>
                <ul>
                    <li>
                        <i class="fas fa-seedling"></i>
                        <a href="#">Gestion des cultures</a>
                    </li>
                    <li>
                        <i class="fas fa-bug"></i>
                        <a href="#">Protection des plantes</a>
                    </li>
                    <li>
                        <i class="fas fa-user-tie"></i>
                        <a href="#">Conseil expert</a>
                    </li>
                    <li>
                        <i class="fas fa-cloud-sun"></i>
                        <a href="#">Météo agricole</a>
                    </li>
                </ul>
            </div>
            
            <div class="footer-column">
                <h3>
                    <i class="fas fa-address-book"></i>
                    Contact
                </h3>
                <ul>
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        Avenue Mohammed V, Rabat, Maroc
                    </li>
                    <li>
                        <i class="fas fa-phone-alt"></i>
                        +212 12 34 56 78
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        contact@agrisupport.ma
                    </li>
                    <li>
                        <i class="fas fa-clock"></i>
                        Lun-Ven: 8h-18h
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2025 AgriSupport. Tous droits réservés. | <a href="#" style="color: white; text-decoration: underline;">Politique de confidentialité</a> | <a href="#" style="color: white; text-decoration: underline;">Conditions d'utilisation</a></p>
        </div>
    </footer>


</body>
</html>