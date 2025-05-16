<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiches Explicatives - AgriVision</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

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
            --shadow-hover: 0 8px 16px rgba(0, 0, 0, 0.12);
            --sidebar-bg: #1B5E20;
            --semis: #2196F3;
            --irrigation: #00BCD4;
            --recolte: #FFC107;
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
        }

        .sidebar {
            width: 250px;
            background-color: var(--sidebar-bg);
            color: white;
            transition: all 0.3s ease;
            position: relative;
            z-index: 10;
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .sidebar-subtitle {
            font-size: 12px;
            opacity: 0.8;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            margin: 5px 0;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            color: var(--background);
            text-decoration: none;
        }

        .menu-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .menu-item.active {
            background-color: var(--primary-dark);
        }

        .menu-icon {
            margin-right: 15px;
            font-size: 18px;
            width: 24px;
            text-align: center;
        }

        .menu-text {
            font-size: 15px;
            font-weight: 500;
        }



        /* Main Content Styles */
        .main-content {
            flex: 1;
            padding: 30px;
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
            position: relative;
        }

        .dashboard-title::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--primary);
            border-radius: 3px;
        }

        .header-icons {
            display: flex;
            gap: 15px;
        }

        .header-icon {
            width: 36px;
            height: 36px;
            background-color: var(--primary-light);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            transition: all 0.3s ease;
        }

        .header-icon:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-2px);
        }

        /* Filter Section */
        .filter-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .search-bar {
            position: relative;
            flex-grow: 1;
            max-width: 400px;
        }

        .search-bar input {
            width: 100%;
            padding: 12px 15px 12px 40px;
            border: 1px solid #ddd;
            border-radius: 30px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .search-bar input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
        }

        .search-bar i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }

        .filter-tags {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .filter-tag {
            padding: 8px 15px;
            background-color: var(--primary-extra-light);
            border-radius: 20px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-tag:hover,
        .filter-tag.active {
            background-color: var(--primary);
            color: white;
        }

        /* Fiches Grid */
        .fiches-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
        }

        .fiche-card {
            background-color: var(--card-bg);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .fiche-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .fiche-image {
            height: 180px;
            position: relative;
            overflow: hidden;
        }

        .fiche-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .fiche-card:hover .fiche-image img {
            transform: scale(1.05);
        }

        .fiche-category {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .fiche-info {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .fiche-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--primary-dark);
        }

        .fiche-description {
            font-size: 14px;
            color: var(--text-light);
            margin-bottom: 15px;
            line-height: 1.5;
            flex: 1;
        }

        .fiche-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
        }

        .fiche-date {
            font-size: 12px;
            color: var(--text-light);
        }

        .fiche-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
        }

        .fiche-link:hover {
            color: var(--primary-dark);
            transform: translateX(3px);
        }

        /* Category Colors */
        .category-technique {
            background-color: var(--semis);
        }

        .category-sante {
            background-color: var(--irrigation);
        }

        .category-reglementation {
            background-color: var(--recolte);
        }

        .category-innovation {
            background-color: var(--secondary);
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .sidebar {
                width: 80px;
            }

            .sidebar-header,
            .menu-text {
                display: none;
            }

            .menu-item {
                justify-content: center;
                color: var(--background);
                text-decoration: none;
            }

            .menu-icon {
                margin-right: 0;
            }
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .header-icons {
                width: 100%;
                justify-content: space-between;
            }

            .filter-section {
                flex-direction: column;
                align-items: flex-start;
            }

            .search-bar {
                max-width: 100%;
                width: 100%;
            }

            .fiches-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
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

            <a class="menu-item" href="{{ route('agriculteur.Calendrier') }}">
                <div class="menu-icon"><i class="fas fa-leaf"></i></div>
                <span class="menu-text">Cultures</span>
            </a>

            <a class="menu-item" href="{{ route('signalers.index') }}">
                <div class="menu-icon"><i class="fas fa-binoculars"></i></div>
                <span class="menu-text">Surveillance</span>
            </a>

            <a class="menu-item " href="{{ route('user') }}">
                <div class="menu-icon"><i class="fas fa-envelope"></i></div>
                <span class="menu-text">Messages</span>
            </a>
            <a class="menu-item active" href="{{ route('agriculteur.FichesExplicatives') }}">
                <div class="menu-icon"><i class="fas fa-file-alt"></i></div>
                <span class="menu-text">Fiches Explicatives</span>
            </a>
            <div class="menu-item">

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button style="background: none;width: 100%;border: none;display: flex;color: white;}"
                        type="submit">
                        <div class="menu-icon"><i class="fas fa-sign-out-alt"></i></div>
                        <span class="menu-text">Paramètres</span>
                    </button>
                </form>

            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <div class="dashboard-title">Fiches Explicatives</div>
        <div class="filter-section">
            <form method="GET" action="{{ route('agriculteur.FichesExplicatives') }}" class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher des fiches...">
            </form>
        </div>
        </div>

        <!-- Filter Section -->



        <!-- Fiches Grid -->
        <div class="fiches-grid">

            @foreach ($fiches as $fiche)
                <div class="fiche-card">
                    <div class="fiche-image">
                        <img src="{{ $fiche->image }}" alt="Techniques de semis">
                    </div>
                    <div class="fiche-info">
                        <h3 class="fiche-title">{{$fiche->name}}</h3>
                        <p class="fiche-description">
                            {{$fiche->description}}
                        </p>
                        <div class="fiche-footer">
                            <span class="fiche-date">15 Mars 2023</span>
                            <a href="{{ route('Technique.show', $fiche->id) }}" class="fiche-link">Voir plus <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>

</body>

</html>