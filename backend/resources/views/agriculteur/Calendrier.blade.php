<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Agricole</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #4CAF50;
            --primary-dark: #388E3C;
            --primary-light: #C8E6C9;
            --secondary: #FF9800;
            --background: #F5F5F5;
            --card-bg: #FFFFFF;
            --text: #333333;
            --text-light: #757575;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --shadow-hover: 0 8px 16px rgba(0, 0, 0, 0.12);
            --semis: #2196F3;
            --irrigation: #00BCD4;
            --recolte: #FFC107;
            --sidebar-bg: #1B5E20;
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

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: var(--sidebar-bg);
            color: white;
            padding: 20px 0;
            transition: all 0.3s;
        }

        .sidebar-header {
            padding: 0 20px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }

        .sidebar-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .sidebar-subtitle {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
        }

        .sidebar-menu {
            padding: 0 15px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            margin-bottom: 5px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .menu-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .menu-item.active {
            background-color: var(--primary-dark);
        }

        .menu-icon {
            margin-right: 10px;
            width: 24px;
            text-align: center;
        }

        .menu-text {
            font-size: 14px;
        }

        /* Header Styles */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .dashboard-title {
            font-size: 24px;
            font-weight: bold;
        }

        .header-icons {
            display: flex;
            gap: 15px;
        }

        .header-icon {
            width: 36px;
            height: 36px;
            background-color: #7ade7a;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .main-content {
            flex: 1;
            padding: 20px;
        }

        /* Stages Legend */
        .stages-legend {
            display: flex;
            gap: 20px;
            margin: 20px 0;
            padding: 15px;
            background-color: var(--card-bg);
            border-radius: 10px;
            box-shadow: var(--shadow);
        }

        .stage-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .stage-color {
            width: 16px;
            height: 16px;
            border-radius: 50%;
        }

        .semis-color {
            background-color: var(--semis);
        }

        .irrigation-color {
            background-color: var(--irrigation);
        }

        .recolte-color {
            background-color: var(--recolte);
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }

        .plant-card {
            background-color: var(--card-bg);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .plant-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .plant-image {
            height: 180px;
            position: relative;
            overflow: hidden;
        }

        .plant-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .plant-card:hover .plant-image img {
            transform: scale(1.05);
        }

        .plant-status {
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

        .plant-info {
            padding: 20px;
        }

        .plant-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--primary-dark);
        }

        .plant-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .plant-detail {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: var(--text-light);
        }

        .plant-detail svg {
            margin-right: 6px;
            color: var(--primary);
        }

        .stages-timeline {
            margin-top: 15px;
        }

        .timeline-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .timeline-title {
            font-size: 14px;
            font-weight: 500;
        }

        .timeline-steps {
            display: flex;
            height: 6px;
            background-color: #E0E0E0;
            border-radius: 3px;
            overflow: hidden;
            margin-bottom: 8px;
        }

        .timeline-step {
            height: 100%;
        }

        .step-semis {
            background-color: var(--semis);
        }

        .step-irrigation {
            background-color: var(--irrigation);
        }

        .step-recolte {
            background-color: var(--recolte);
        }

        .timeline-labels {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: var(--text-light);
        }

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
            }

            .menu-icon {
                margin-right: 0;
            }
        }

        @media (max-width: 768px) {
            .grid-container {
                grid-template-columns: 1fr;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .header-icons {
                width: 100%;
                justify-content: space-between;
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
        <!-- Header -->
        <div class="header">
            <div class="dashboard-title">Dashboard</div>
            <div class="header-icons">
                <div class="header-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                </div>
                <div class="header-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>
                </div>
                <div class="header-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Stages Legend -->
        <div class="stages-legend">
            <div class="stage-item">
                <div class="stage-color semis-color"></div>
                <span>Semis</span>
            </div>
            <div class="stage-item">
                <div class="stage-color irrigation-color"></div>
                <span>Irrigation</span>
            </div>
            <div class="stage-item">
                <div class="stage-color recolte-color"></div>
                <span>Récolte</span>
            </div>
        </div>

        <!-- Plant Cards Grid -->
        <div class="grid-container">
            @foreach($calendars as $calendar)
            <div class="plant-card">
                <div class="plant-image">
                    <img src="https://t3.ftcdn.net/jpg/08/61/50/10/360_F_861501010_nrCiwa9E6WzvEQeqWfTgshH1mI0kcHD4.jpg" alt="{{ $calendar->name }}">
                    <div class="plant-status">{{ $calendar->etapes }}</div>
                </div>
                <div class="plant-info">
                    <h3 class="plant-title">{{ $calendar->name }}</h3>
                    <div class="plant-details">
                        <div class="plant-detail">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            {{ $calendar->type ?? 'N/A' }}
                        </div>
                        <div class="plant-detail">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            {{ $calendar->jours_restants }} jours
                        </div>
                    </div>
                    <div class="stages-timeline">
                        <div class="timeline-header">
                            <span class="timeline-title">Étape actuelle: {{ $calendar->etapes }}</span>
                        </div>
                        <div class="timeline-steps">
                            <div class="timeline-step step-semis" style="width: 33%"></div>
                            <div class="timeline-step step-irrigation" style="width: 33%"></div>
                            <div class="timeline-step step-recolte" style="width: 34%"></div>
                        </div>
                        <div class="timeline-labels">
                            <span>Semis</span>
                            <span>Irrigation</span>
                            <span>Récolte</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>