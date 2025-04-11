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




</body>
</html>