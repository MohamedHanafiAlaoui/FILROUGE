<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Fiches Explicatives - AgriVision</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            --sidebar-bg: #1B5E20;
            --error: #f44336;
            --border-radius: 8px;
            --transition: all 0.3s ease;
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
            line-height: 1.6;
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

        /* Button styles */
        .btn {
            padding: 10px 20px;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            outline: none;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            box-shadow: var(--shadow-hover);
        }

        .btn-secondary {
            background-color: var(--secondary);
            color: white;
        }

        .btn-secondary:hover {
            background-color: #e68a00;
            box-shadow: var(--shadow-hover);
        }

        /* Table styles */
        .table-container {
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 20px;
            box-shadow: var(--shadow);
            overflow-x: auto;
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

        .actions {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            padding: 6px 10px;
            border-radius: 4px;
            font-size: 14px;
            transition: var(--transition);
        }

        .edit-btn {
            background-color: var(--secondary);
            color: white;
        }

        .delete-btn {
            background-color: var(--error);
            color: white;
        }

        .view-btn {
            background-color: var(--primary);
            color: white;
        }

        /* Search and filter */
        .table-controls {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .search-box {
            flex: 1;
            min-width: 250px;
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 10px 15px 10px 40px;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 5px;
        }

        .page-item {
            list-style: none;
        }

        .page-link {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            color: var(--primary-dark);
            text-decoration: none;
            transition: var(--transition);
        }

        .page-link:hover {
            background-color: var(--primary-light);
        }

        .page-item.active .page-link {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
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
            .sidebar {
                width: 80px;
            }
            



            .main-content {
                padding: 20px;
            }
            
            .header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
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

    <div class="main-content">
        <div class="header">
            <h1 class="page-title">Fiches Explicatives</h1>
            <a href="{{ route('admin.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nouvelle Fiche
            </a>
        </div>

        <div class="table-container">
            <div class="table-controls">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Rechercher...">
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Image</th>
                        <th>Date Création</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fiches as $fiche)
                    <tr>
                        <td>{{ $fiche->id }}</td>
                        <td>{{ $fiche->name }}</td>
                        <td>
                            @if($fiche->image)
                            <img src="{{ $fiche->image }}" alt="Fiche image" style="max-width: 50px; max-height: 50px; border-radius: 4px;">
                            @else
                            <span class="text-muted">Aucune image</span>
                            @endif
                        </td>
                        <td>{{ $fiche->created_at ?  $fiche->created_at->format('d-m-Y')  :  ''}}</td>
                        <td class="actions">

                            <a href="{{ route('admin.Update', $fiche->id) }}" class="action-btn edit-btn" title="Modifier">
                                <i class="fas fa-edit"></i>
                            </a>
  
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="pagination">
                {{ $fiches->links() }}
            </div>
        </div>
    </div>

    @if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            if (searchInput) {
                searchInput.addEventListener('keyup', function() {
                    const searchTerm = this.value.toLowerCase();
                    const rows = document.querySelectorAll('tbody tr');
                    
                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        row.style.display = text.includes(searchTerm) ? '' : 'none';
                    });
                });
            }

            const deleteForms = document.querySelectorAll('form[action*="destroy"]');
            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    if (!confirm('Êtes-vous sûr de vouloir supprimer cette fiche ? Cette action est irréversible.')) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
</body>
</html>