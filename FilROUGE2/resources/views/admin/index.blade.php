<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques - AgriVision</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        }

        /* Sidebar styles */
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

        /* Main content styles */
        .main-content {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
        }

        /* Header styles */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 600;
            color: var(--primary-dark);
        }

        /* Stats cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background-color: var(--card-bg);
            border-radius: 8px;
            padding: 20px;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            box-shadow: var(--shadow-hover);
            transform: translateY(-2px);
        }

        .stat-card-title {
            font-size: 16px;
            color: var(--text-light);
            margin-bottom: 10px;
        }

        .stat-card-value {
            font-size: 28px;
            font-weight: 600;
            color: var(--primary-dark);
        }



        /* Tables section */
        .tables-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 30px;
        }

        .table-container {
            background-color: var(--card-bg);
            border-radius: 8px;
            padding: 20px;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }

        .table-container:hover {
            box-shadow: var(--shadow-hover);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: var(--primary-light);
            color: var(--primary-dark);
            font-weight: 600;
        }

        tr:hover {
            background-color: rgba(76, 175, 80, 0.05);
        }

        /* Responsive design */
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
            .main-content {
                padding: 20px;
            }
            
            .header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .charts-section, .tables-section {
                grid-template-columns: 1fr;
            }
            
            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 576px) {
            .stats-grid {
                grid-template-columns: 1fr;
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
            <a class="menu-item" href="{{ route('admin.index') }}">
                <div class="menu-icon"><i class="fas fa-leaf"></i></div>
                <span class="menu-text">Cultures</span>
            </a>

            <a class="menu-item" href="{{ route('admin.FichesExplicatives') }}">
                <div class="menu-icon"><i class="fas fa-binoculars"></i></div>
                <span class="menu-text">Surveillance</span>
            </a>

        </div>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
        <div class="header">
            <h1 class="page-title">Statistiques des Fiches Explicatives</h1>
        </div>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-card-title">Total des Fiches</div>
                <div class="stat-card-value">{{ $totalCalendars }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-card-title">Total des Signalements</div>
                <div class="stat-card-value">{{ $totalSignals }}</div>
            </div>
            @foreach($calendarsByType as $type => $count)
            <div class="stat-card">
                <div class="stat-card-title">Fiches "{{ $type }}"</div>
                <div class="stat-card-value">{{ $count }}</div>
            </div>
            @endforeach
        </div>



        <!-- Tables Section -->
        <div class="tables-section">
            <div class="table-container">
                <h3 class="chart-title">Top Agriculteurs (par nombre de fiches)</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Agriculteur</th>
                            <th>Nombre de Fiches</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($calendarsPerFarmer as $farmer)
                        <tr>
                            <td>{{ $farmer->name }}</td>
                            <td>{{ $farmer->calendar_count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="table-container">
                <h3 class="chart-title">Fiches les plus Signalées</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Fiche</th>
                            <th>Type</th>
                            <th>Signalements</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($signalsPerCalendar as $calendar)
                        <tr>
                            <td>{{ $calendar->name }}</td>
                            <td>{{ $calendar->etapes }}</td>
                            <td>{{ $calendar->signal_count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Monthly Activity Chart
        const monthlyCtx = document.getElementById('monthlyActivityChart').getContext('2d');
        const monthlyActivityChart = new Chart(monthlyCtx, {
            type: 'line',
            data: {
                labels: @json($monthlyLabels),
                datasets: [
                    {
                        label: 'Fiches Créées',
                        data: @json($calendarMonthlyCounts),
                        borderColor: '#4CAF50',
                        backgroundColor: 'rgba(76, 175, 80, 0.1)',
                        tension: 0.3,
                        fill: true
                    },
                    {
                        label: 'Signalements',
                        data: @json($signalMonthlyCounts),
                        borderColor: '#FF9800',
                        backgroundColor: 'rgba(255, 152, 0, 0.1)',
                        tension: 0.3,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Type Distribution Chart
        const typeCtx = document.getElementById('typeDistributionChart').getContext('2d');
        const typeDistributionChart = new Chart(typeCtx, {
            type: 'doughnut',
            data: {
                labels: @json($calendarsByType->keys()),
                datasets: [{
                    data: @json($calendarsByType->values()),
                    backgroundColor: [
                        '#4CAF50',
                        '#8BC34A',
                        '#CDDC39',
                        '#FFC107',
                        '#FF9800',
                        '#FF5722'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                    }
                }
            }
        });
    </script>
</body>
</html>