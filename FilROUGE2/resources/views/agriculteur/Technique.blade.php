<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche Technique Tomate - AgriVision</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./css/Sidebar.css">
    <style>
        :root {
            --primary: #4CAF50;
            --primary-dark: #388E3C;
            --primary-light: #C8E6C9;
            --primary-extra-light: #E8F5E9;
            --secondary: #FF9800;
            --background: #F5F5F5;
            --card-bg: #FFFFFF;
            --text: #333333;
            --text-light: #757575;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --shadow-hover: 0 8px 16px rgba(0, 0, 0, 0.15);
            --sidebar-bg: #1B5E20;
            --danger: #F44336;
            --warning: #FFC107;
            --info: #2196F3;
            --tomato-red: #FF6347;
            --tomato-green: #2E8B57;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background-color: var(--background);
            color: var(--text);
            display: flex;
            min-height: 100vh;
            background-image: url('data:image/svg+xml;utf8,<svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" opacity="0.03"><path d="M30,10 Q50,5 70,10 T90,30 Q95,50 90,70 T70,90 Q50,95 30,90 T10,70 Q5,50 10,30 T30,10" fill="%234CAF50"/></svg>');
        }
        

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 30px;
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .dashboard-title {
            font-size: 24px;
            font-weight: bold;
            color: var(--primary-dark);
            position: relative;
            display: inline-block;
        }
        
        .dashboard-title::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--tomato-red);
            border-radius: 3px;
        }
        
        /* Tomato Hero Section */
        .tomato-hero {
            position: relative;
            height: 350px;
            border-radius: 16px;
            overflow: hidden;
            margin-bottom: 40px;
            box-shadow: var(--shadow);
        }
        
        .tomato-hero-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s ease;
        }
        
        .tomato-hero:hover .tomato-hero-image {
            transform: scale(1.05);
        }
        
        .tomato-hero-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 30px;
            background: linear-gradient(transparent, rgba(0,0,0,0.8));
            color: white;
        }
        
        .tomato-title {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 5px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }
        
        .tomato-latin {
            font-style: italic;
            opacity: 0.9;
            margin-bottom: 15px;
            display: inline-block;
            background-color: rgba(0,0,0,0.4);
            padding: 4px 10px;
            border-radius: 12px;
        }
        
        .tomato-meta {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }
        
        .tomato-meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            background-color: rgba(255,255,255,0.15);
            backdrop-filter: blur(5px);
            padding: 6px 12px;
            border-radius: 20px;
            transition: all 0.3s ease;
        }
        
        .tomato-meta-item:hover {
            background-color: var(--tomato-red);
            transform: translateY(-2px);
        }
        
        /* Tomato Details Grid */
        .tomato-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }
        
        .detail-card {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 25px;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            border-top: 4px solid var(--tomato-green);
            position: relative;
            overflow: hidden;
        }
        
        .detail-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }
        
        .detail-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background-color: var(--tomato-red);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.5s ease;
        }
        
        .detail-card:hover::before {
            transform: scaleX(1);
        }
        
        .detail-card h3 {
            color: var(--tomato-green);
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid var(--primary-light);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .detail-list {
            list-style: none;
        }
        
        .detail-list li {
            margin-bottom: 12px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            position: relative;
            padding-left: 25px;
        }
        
        .detail-list li::before {
            content: '';
            position: absolute;
            left: 0;
            top: 8px;
            width: 12px;
            height: 12px;
            background-color: var(--tomato-red);
            border-radius: 50%;
            opacity: 0.7;
        }
        
        /* Growth Stages */
        .section-title {
            font-size: 24px;
            color: var(--primary-dark);
            margin-bottom: 25px;
            position: relative;
            display: inline-block;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 3px;
            background-color: var(--tomato-red);
            border-radius: 3px;
        }
        
        .growth-stages {
            margin-bottom: 40px;
        }
        
        .stage {
            display: flex;
            margin-bottom: 25px;
            background-color: var(--card-bg);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }
        
        .stage:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
        }
        
        .stage-image {
            width: 200px;
            min-height: 180px;
            background-size: cover;
            background-position: center;
            transition: all 0.5s ease;
        }
        
        .stage:hover .stage-image {
            transform: scale(1.05);
        }
        
        .stage-content {
            flex: 1;
            padding: 20px;
            position: relative;
        }
        
        .stage-title {
            color: var(--primary-dark);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .stage-days {
            background-color: var(--primary-light);
            color: var(--primary-dark);
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .stage-icon {
            width: 30px;
            height: 30px;
            background-color: var(--tomato-red);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }
        
        /* Problems & Solutions */
        .problems-section {
            margin-bottom: 40px;
        }
        
        .problems-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        
        .problem-card {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 20px;
            box-shadow: var(--shadow);
            border-top: 4px solid var(--danger);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .problem-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255,255,255,0.1), transparent);
            pointer-events: none;
        }
        
        .problem-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }
        
        .problem-card.warning {
            border-top-color: var(--warning);
        }
        
        .problem-card.info {
            border-top-color: var(--info);
        }
        
        .problem-card h4 {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--text);
        }
        
        .problem-card i {
            font-size: 20px;
        }
        
        .problem-card i.fa-bug {
            color: var(--danger);
        }
        
        .problem-card i.fa-leaf {
            color: var(--primary);
        }
        
        .problem-symptoms, .problem-solution {
            padding-left: 30px;
            position: relative;
            margin-bottom: 8px;
        }
        
        .problem-symptoms::before {
            content: '🛈';
            position: absolute;
            left: 0;
            color: var(--danger);
        }
        
        .problem-solution::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--primary);
            font-weight: bold;
        }
        
        /* Harvest Section */
        .harvest-section {
            background-color: var(--primary-extra-light);
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 40px;
            border-left: 4px solid var(--tomato-red);
            position: relative;
            overflow: hidden;
        }
        
        .harvest-section::before {
            content: '';
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100px;
            height: 100px;
            background-color: var(--tomato-red);
            opacity: 0.1;
            border-radius: 50%;
        }
        
        .harvest-title {
            color: var(--tomato-green);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .harvest-list {
            list-style: none;
            columns: 2;
            column-gap: 30px;
        }
        
        .harvest-list li {
            margin-bottom: 12px;
            position: relative;
            padding-left: 25px;
            break-inside: avoid;
        }
        
        .harvest-list li::before {
            content: '🍅';
            position: absolute;
            left: 0;
        }
        
        /* Responsive Design */
        @media (max-width: 1200px) {
            .tomato-hero {
                height: 300px;
            }
            
            .tomato-title {
                font-size: 36px;
            }
        }
        
        @media (max-width: 992px) {
            .sidebar {
                width: 80px;
            }
            
            .sidebar-header, .menu-text {
                display: none;
            }
            
            .menu-item {
                justify-content: center;
            }
            
            .menu-icon {
                margin-right: 0;
                font-size: 20px;
            }
            
            .harvest-list {
                columns: 1;
            }
        }
        
        @media (max-width: 768px) {
            .main-content {
                padding: 20px;
            }
            
            .tomato-hero {
                height: 250px;
            }
            
            .tomato-title {
                font-size: 28px;
            }
            
            .tomato-meta {
                gap: 10px;
            }
            
            .stage {
                flex-direction: column;
            }
            
            .stage-image {
                width: 100%;
                height: 150px;
            }
            
            .detail-card {
                padding: 20px;
            }
        }
        
        @media (max-width: 576px) {
            .tomato-hero {
                height: 200px;
            }
            
            .tomato-hero-content {
                padding: 20px;
            }
            
            .tomato-title {
                font-size: 24px;
            }
            
            .tomato-latin {
                font-size: 14px;
            }
        }
        
        /* Animations */
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
    </style>
</head>
<body>
    <!-- Sidebar Section -->
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-title">AgriVision</div>
            <div class="sidebar-subtitle">Gestion des cultures</div>
        </div>
        <div class="sidebar-menu">
            <div class="menu-item">
                <div class="menu-icon"><i class="fas fa-tachometer-alt"></i></div>
                <span class="menu-text">Tableau de bord</span>
            </div>
            <div class="menu-item">
                <div class="menu-icon"><i class="fas fa-leaf"></i></div>
                <span class="menu-text">Cultures</span>
            </div>
            <div class="menu-item">
                <div class="menu-icon"><i class="fas fa-seedling"></i></div>
                <span class="menu-text">Stades de croissance</span>
            </div>
            <div class="menu-item">
                <div class="menu-icon"><i class="fas fa-binoculars"></i></div>
                <span class="menu-text">Surveillance</span>
            </div>
            <div class="menu-item">
                <div class="menu-icon"><i class="fas fa-chart-line"></i></div>
                <span class="menu-text">Analytiques</span>
            </div>
            <div class="menu-item">
                <div class="menu-icon"><i class="fas fa-envelope"></i></div>
                <span class="menu-text">Messages</span>
            </div>
            <div class="menu-item active">
                <div class="menu-icon"><i class="fas fa-file-alt"></i></div>
                <span class="menu-text">Fiches Explicatives</span>
            </div>
            <div class="menu-item">
                <div class="menu-icon"><i class="fas fa-cog"></i></div>
                <span class="menu-text">Paramètres</span>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
        <div class="header">
            <h1 class="dashboard-title">Fiche Technique: Tomate</h1>
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
            <img src="https://www.nature-and-garden.com/wp-content/uploads/sites/4/2018/10/growing-tomatoes.jpg" 
                 alt="Champ de tomates" 
                 class="tomato-hero-image">
            <div class="tomato-hero-content">
                <h1 class="tomato-title">Tomate <span class="tomato-latin">(Solanum lycopersicum)</span></h1>
                <div class="tomato-meta">
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
                </div>
            </div>
        </div>
        

        
        <!-- Growth Stages -->
        <div class="growth-stages">
            <h2 class="section-title"><i class="fas fa-chart-line"></i> Étapes de Croissance</h2>
            
            <div class="stage">
                <div class="stage-image" style="background-image: url('https://images.unsplash.com/photo-1597022323696-21ed273a3d19?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=300&q=80');"></div>
                <div class="stage-content">
                    <h3 class="stage-title">
                        <span class="stage-icon"><i class="fas fa-seedling"></i></span>
                        Semis <span class="stage-days">J1-J15</span>
                    </h3>
                    <p>Semer en terrine à 20°C. Repiquer en godet après apparition des 2 premières vraies feuilles. Durée : 6-8 semaines avant plantation. Maintenir une humidité constante sans excès.</p>
                </div>
            </div>
            
            <div class="stage">
                <div class="stage-image" style="background-image: url('https://images.unsplash.com/photo-1595871151131-9f5670ff7b9b?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=300&q=80');"></div>
                <div class="stage-content">
                    <h3 class="stage-title">
                        <span class="stage-icon"><i class="fas fa-leaf"></i></span>
                        Croissance Végétative <span class="stage-days">J16-J45</span>
                    </h3>
                    <p>Développement du feuillage et des tiges. Tuteurer les plants. Supprimer les gourmands (rejets à l'aisselle des feuilles) pour favoriser la fructification. Fertilisation équilibrée NPK.</p>
                </div>
            </div>
            
            <div class="stage">
                <div class="stage-image" style="background-image: url('https://images.unsplash.com/photo-1559561724-0a2e96a5b4a5?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=300&q=80');"></div>
                <div class="stage-content">
                    <h3 class="stage-title">
                        <span class="stage-icon"><i class="fas fa-spa"></i></span>
                        Floraison <span class="stage-days">J46-J60</span>
                    </h3>
                    <p>Apparition des premières fleurs jaunes. Favoriser la pollinisation par vibration douce des plants ou présence d'insectes pollinisateurs. Réduire légèrement les apports d'azote au profit de la potasse.</p>
                </div>
            </div>
            
            <div class="stage">
                <div class="stage-image" style="background-image: url('https://images.unsplash.com/photo-1594282418426-62d3e05e5a4b?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=300&q=80');"></div>
                <div class="stage-content">
                    <h3 class="stage-title">
                        <span class="stage-icon"><i class="fas fa-apple-alt"></i></span>
                        Fructification <span class="stage-days">J61-J90</span>
                    </h3>
                    <p>Développement des fruits. Surveiller l'arrosage (irrégularité = éclatement des fruits). Récolte environ 45-60 jours après floraison. Protection contre les oiseaux si nécessaire.</p>
                </div>
            </div>
        </div>
        
        <!-- Common Problems -->
        <div class="problems-section">
            <h2 class="section-title"><i class="fas fa-exclamation-triangle"></i> Problèmes Courants</h2>
            <div class="problems-grid">
                <div class="problem-card">
                    <h4><i class="fas fa-bug"></i> Mildiou (Phytophthora infestans)</h4>
                    <div class="problem-symptoms">
                        <strong>Symptômes :</strong> Taches brunes huileuses sur feuilles, blanc duveteux au verso, fruits tachés
                    </div>
                    <div class="problem-solution">
                        <strong>Solution :</strong> Traitement préventif à la bouillie bordelaise. Éviter l'humidité sur feuillage. Variétés résistantes.
                    </div>
                </div>
                
                <div class="problem-card warning">
                    <h4><i class="fas fa-bug"></i> Nécrose apicale</h4>
                    <div class="problem-symptoms">
                        <strong>Symptômes :</strong> Tache noire à l'extrémité des fruits, carence en calcium
                    </div>
                    <div class="problem-solution">
                        <strong>Solution :</strong> Arrosage régulier, apport de calcium (coquilles d'œufs broyées), paillage.
                    </div>
                </div>
                
                <div class="problem-card info">
                    <h4><i class="fas fa-leaf"></i> Fonte des semis</h4>
                    <div class="problem-symptoms">
                        <strong>Symptômes :</strong> Pourriture à la base des jeunes plants, effondrement
                    </div>
                    <div class="problem-solution">
                        <strong>Solution :</strong> Semis en substrat sain, éviter l'excès d'eau, bonne aération.
                    </div>
                </div>
                
                <div class="problem-card">
                    <h4><i class="fas fa-bug"></i> Aleurodes</h4>
                    <div class="problem-symptoms">
                        <strong>Symptômes :</strong> Petites mouches blanches sous les feuilles, miellat collant
                    </div>
                    <div class="problem-solution">
                        <strong>Solution :</strong> Pièges jaunes gluants, savon noir, lâcher d'auxiliaires (Macrolophus).
                    </div>
                </div>
                
                <div class="problem-card warning">
                    <h4><i class="fas fa-leaf"></i> Fendillement des fruits</h4>
                    <div class="problem-symptoms">
                        <strong>Symptômes :</strong> Éclatement des tomates, surtout après une période sèche
                    </div>
                    <div class="problem-solution">
                        <strong>Solution :</strong> Arrosage régulier (pas d'excès après sécheresse). Variétés moins sensibles.
                    </div>
                </div>
                
                <div class="problem-card info">
                    <h4><i class="fas fa-bug"></i> Tuta absoluta</h4>
                    <div class="problem-symptoms">
                        <strong>Symptômes :</strong> Galeries dans feuilles et fruits, dégâts importants
                    </div>
                    <div class="problem-solution">
                        <strong>Solution :</strong> Pièges à phéromones, filet anti-insectes, Bacillus thuringiensis.
                    </div>
                </div>
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