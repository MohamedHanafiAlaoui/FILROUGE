<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriVision - Gestion Agricole</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./css/Sidebar.css">
    
    <style>
        :root {
            /* Couleurs */
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
        

        
        /* ============ MAIN CONTENT ============ */
        .main-content {
            flex: 1;
            padding: 30px;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }
        
        .top-section {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        /* ============ HEADER ============ */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }
        
        .dashboard-title {
            font-size: 24px;
            font-weight: bold;
            color: var(--primary-dark);
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
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .header-icon:hover {
            background-color: var(--primary);
            transform: translateY(-2px);
        }
        
        /* ============ PAGE HEADER ============ */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .page-title {
            font-size: 24px;
            font-weight: 600;
            color: var(--primary-dark);
        }
        
        .add-button {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .add-button:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        /* ============ FORMULAIRE AJOUT ÉTAPE ============ */
        .form-container {
            display: none;
            background-color: var(--card-bg);
            padding: 25px;
            border-radius: 8px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
        }
        
        .form-container.active {
            display: block;
        }
        
        .form-title {
            font-size: 20px;
            margin-bottom: 20px;
            color: var(--primary-dark);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        .form-input {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        
        .form-textarea {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            min-height: 100px;
            resize: vertical;
        }
        
        .form-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 20px;
        }
        
        .cancel-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
        }
        
        .submit-btn {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
        }
        
        /* ============ PLANT DETAILS ============ */
        .back-button {
            align-self: flex-start;
            display: flex;
            align-items: center;
            color: var(--primary-dark);
            text-decoration: none;
            font-weight: 500;
        }
        
        .back-button i {
            margin-right: 8px;
        }
        
        .plant-single-card {
            background-color: var(--card-bg);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
            width: 100%;
            max-width: 800px;
        }
        
        .plant-header {
            display: flex;
            flex-direction: column;
        }
        
        .plant-image {
            height: 300px;
            position: relative;
            overflow: hidden;
        }
        
        .plant-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .plant-status {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
        }
        
        .plant-meta {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
        }
        
        .plant-title {
            font-size: 24px;
            font-weight: 600;
            color: var(--primary-dark);
        }
        
        .plant-id {
            font-size: 14px;
            color: var(--text-light);
            display: flex;
            align-items: center;
        }
        
        .plant-id i {
            margin-right: 6px;
        }
        
        .plant-days {
            font-size: 16px;
            color: var(--text);
            display: flex;
            align-items: center;
        }
        
        .plant-days i {
            margin-right: 6px;
            color: var(--secondary);
        }
        
        .plant-content {
            padding: 25px;
        }
        
        .current-stage {
            font-size: 18px;
            margin-bottom: 15px;
            color: var(--text);
        }
        
        .current-stage strong {
            color: var(--primary-dark);
        }
        
        .stages-timeline {
            margin: 30px 0;
        }
        
        .timeline-steps {
            display: flex;
            height: 8px;
            background-color: #E0E0E0;
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 10px;
        }
        
        .timeline-step {
            height: 100%;
        }
        
        .step-semis { background-color: var(--semis); }
        .step-irrigation { background-color: var(--irrigation); }
        .step-recolte { background-color: var(--recolte); }
        
        .timeline-labels {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            color: var(--text-light);
        }
        
        .stage-details {
            margin-top: 30px;
        }
        
        .stage-detail {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }
        
        .stage-name {
            font-weight: 500;
        }
        
        .stage-status {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .status-completed {
            background-color: var(--primary-light);
            color: var(--primary-dark);
        }
        
        .status-active {
            background-color: var(--secondary);
            color: white;
        }
        
        .status-pending {
            background-color: #E0E0E0;
            color: var(--text-light);
        }
        
        .signal-button {
            margin-top: 30px;
            padding: 12px 25px;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .signal-button:hover {
            background-color: var(--primary-dark);
        }
        
        .signal-button i {
            margin-right: 8px;
        }
        
        /* ============ STAGES TABLE ============ */
        .stages-table {
            width: 100%;
            border-collapse: collapse;
            background-color: var(--card-bg);
            box-shadow: var(--shadow);
            border-radius: 8px;
            overflow: hidden;
        }
        
        .stages-table th {
            background-color: var(--primary);
            color: white;
            text-align: left;
            padding: 15px;
            font-weight: 500;
        }
        
        .stages-table td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }
        
        .stages-table tr:last-child td {
            border-bottom: none;
        }
        
        .stages-table tr:hover {
            background-color: var(--primary-light);
        }
        
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        
        .edit-btn, .delete-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .edit-btn {
            background-color: var(--secondary);
            color: white;
        }
        
        .edit-btn:hover {
            background-color: #e68a00;
        }
        
        .delete-btn {
            background-color: #f44336;
            color: white;
        }
        
        .delete-btn:hover {
            background-color: #d32f2f;
        }
        
        /* ============ RESPONSIVE ============ */
        @media (max-width: 768px) {
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
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 5px;
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
            
            .plant-image {
                height: 200px;
            }
            
            .plant-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            
            .plant-content {
                padding: 20px;
            }
            
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .form-buttons {
                flex-direction: column;
            }
            
            .cancel-btn, .submit-btn {
                width: 100%;
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

    <!-- ============ MAIN CONTENT AREA ============ -->
    <div class="main-content">
        <!-- Top Section with Header -->
        <div class="top-section">
            <div class="header">
                <div class="dashboard-title">Dashboard</div>
                <div class="header-icons">
                    <div class="header-icon">
                        <i class="fas fa-comment-alt"></i>
                    </div>
                    <div class="header-icon">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="header-icon">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>

            <div class="page-header">
                <h1 class="page-title">Gestion des Étapes Agricoles</h1>
                <button class="add-button" id="showFormBtn">
                    <i class="fas fa-plus"></i>
                    Ajouter une Étape
                </button>
            </div>
        </div>

        <!-- Formulaire d'ajout d'étape -->
        <div class="form-container" id="addStageForm">
            <h2 class="form-title">Ajouter une nouvelle étape</h2>
            <form id="stageForm">
                <div class="form-group">
                    <label for="stageName" class="form-label">Nom de l'étape</label>
                    <input type="text" id="stageName" class="form-input" required>
                </div>
                
                <div class="form-group">
                    <label for="stageDescription" class="form-label">Description</label>
                    <textarea id="stageDescription" class="form-textarea" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="stageDuration" class="form-label">Durée (jours)</label>
                    <input type="number" id="stageDuration" class="form-input" required>
                </div>
                
                <div class="form-buttons">
                    <button type="button" class="cancel-btn" id="cancelFormBtn">Annuler</button>
                    <button type="submit" class="submit-btn">Enregistrer</button>
                </div>
            </form>
        </div>

        <!-- Plant Details Section -->
        <a href="#" class="back-button">
            <i class="fas fa-arrow-left"></i> Retour au tableau de bord
        </a>
        
        <div class="plant-single-card">
            <div class="plant-header">
                <div class="plant-image">
                    <img src="https://images.unsplash.com/photo-1594282418426-62d3e05e5a4b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&h=300&q=80" alt="Tomates">
                    <div class="plant-status">Fruit</div>
                </div>
                <div class="plant-meta">
                    <div>
                        <h1 class="plant-title">Tomates</h1>
                        <div class="plant-id">
                            <i class="fas fa-user-tag"></i> Agriculteur: AG001
                        </div>
                    </div>
                    <div class="plant-days">
                        <i class="fas fa-clock"></i> 28 jours restants
                    </div>
                </div>
            </div>
            
            <div class="plant-content">
                <p class="current-stage">
                    Étape actuelle: <strong>Irrigation</strong>
                </p>
                
                <div class="stages-timeline">
                    <div class="timeline-steps">
                        <div class="timeline-step step-semis" style="width: 16.66%"></div>
                        <div class="timeline-step step-irrigation" style="width: 50%"></div>
                        <div class="timeline-step step-recolte" style="width: 33.33%"></div>
                    </div>
                    <div class="timeline-labels">
                        <span>Semis</span>
                        <span>Irrigation</span>
                        <span>Récolte</span>
                    </div>
                </div>
                
                <div class="stage-details">
                    <div class="stage-detail">
                        <span class="stage-name">Semis</span>
                        <span class="stage-status status-completed">Terminé (7 jours)</span>
                    </div>
                    <div class="stage-detail">
                        <span class="stage-name">Irrigation</span>
                        <span class="stage-status status-active">En cours (21 jours)</span>
                    </div>
                    <div class="stage-detail">
                        <span class="stage-name">Récolte</span>
                        <span class="stage-status status-pending">À venir (14 jours)</span>
                    </div>
                </div>
                
                <button class="signal-button">
                    <i class="fas fa-exclamation-triangle"></i> Signaler un problème
                </button>
            </div>
        </div>

        <!-- Stages Table -->
        <table class="stages-table">
            <thead>
                <tr>
                    <th>Étape</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Semis</td>
                    <td>Préparation du sol et semis</td>
                    <td>
                        <div class="action-buttons">
                            <button class="edit-btn">
                                <i class="fas fa-edit"></i>
                                Modifier
                            </button>
                            <button class="delete-btn">
                                <i class="fas fa-trash"></i>
                                Supprimer
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Irrigation</td>
                    <td>Irrigation initiale</td>
                    <td>
                        <div class="action-buttons">
                            <button class="edit-btn">
                                <i class="fas fa-edit"></i>
                                Modifier
                            </button>
                            <button class="delete-btn">
                                <i class="fas fa-trash"></i>
                                Supprimer
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Fertilisation</td>
                    <td>Application d'engrais</td>
                    <td>
                        <div class="action-buttons">
                            <button class="edit-btn">
                                <i class="fas fa-edit"></i>
                                Modifier
                            </button>
                            <button class="delete-btn">
                                <i class="fas fa-trash"></i>
                                Supprimer
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Traitement</td>
                    <td>Contrôle des parasites</td>
                    <td>
                        <div class="action-buttons">
                            <button class="edit-btn">
                                <i class="fas fa-edit"></i>
                                Modifier
                            </button>
                            <button class="delete-btn">
                                <i class="fas fa-trash"></i>
                                Supprimer
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Récolte</td>
                    <td>Collecte des produits agricoles</td>
                    <td>
                        <div class="action-buttons">
                            <button class="edit-btn">
                                <i class="fas fa-edit"></i>
                                Modifier
                            </button>
                            <button class="delete-btn">
                                <i class="fas fa-trash"></i>
                                Supprimer
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        // ============ INTERACTIONS ============
        // Menu navigation
        const menuItems = document.querySelectorAll('.menu-item');
        menuItems.forEach(item => {
            item.addEventListener('click', () => {
                menuItems.forEach(i => i.classList.remove('active'));
                item.classList.add('active');
            });
        });
        
        // Gestion du formulaire
        const showFormBtn = document.getElementById('showFormBtn');
        const addStageForm = document.getElementById('addStageForm');
        const cancelFormBtn = document.getElementById('cancelFormBtn');
        const stageForm = document.getElementById('stageForm');
        
        showFormBtn.addEventListener('click', () => {
            addStageForm.classList.add('active');
        });
        
        cancelFormBtn.addEventListener('click', () => {
            addStageForm.classList.remove('active');
            stageForm.reset();
        });
        
        stageForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const stageName = document.getElementById('stageName').value;
            const stageDescription = document.getElementById('stageDescription').value;
            const stageDuration = document.getElementById('stageDuration').value;
            
            // Ajouter la nouvelle étape au tableau
            const tableBody = document.querySelector('.stages-table tbody');
            const newRow = document.createElement('tr');
            
            newRow.innerHTML = `
                <td>${stageName}</td>
                <td>${stageDescription}</td>
                <td>
                    <div class="action-buttons">
                        <button class="edit-btn">
                            <i class="fas fa-edit"></i>
                            Modifier
                        </button>
                        <button class="delete-btn">
                            <i class="fas fa-trash"></i>
                            Supprimer
                        </button>
                    </div>
                </td>
            `;
            
            tableBody.appendChild(newRow);
            
            // Réinitialiser et masquer le formulaire
            stageForm.reset();
            addStageForm.classList.remove('active');
            
            // Ajouter les écouteurs d'événements aux nouveaux boutons
            addEventListenersToNewRow(newRow);
            
            alert(`Nouvelle étape "${stageName}" ajoutée avec succès!`);
        });
        
        function addEventListenersToNewRow(row) {
            row.querySelector('.edit-btn').addEventListener('click', function() {
                const etape = row.cells[0].textContent;
                alert(`Modifier l'étape: ${etape}`);
            });
            
            row.querySelector('.delete-btn').addEventListener('click', function() {
                const etape = row.cells[0].textContent;
                if(confirm(`Supprimer l'étape "${etape}"?`)) {
                    row.remove();
                }
            });
        }
        
        // Edit buttons
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const row = this.closest('tr');
                const etape = row.cells[0].textContent;
                alert(`Modifier l'étape: ${etape}`);
            });
        });
        
        // Delete buttons
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const row = this.closest('tr');
                const etape = row.cells[0].textContent;
                if(confirm(`Supprimer l'étape "${etape}"?`)) {
                    row.remove();
                }
            });
        });
        
        // Signal button
        document.querySelector('.signal-button').addEventListener('click', function() {
            alert("Signaler un problème avec cette culture");
        });
    </script>
</body>
</html>