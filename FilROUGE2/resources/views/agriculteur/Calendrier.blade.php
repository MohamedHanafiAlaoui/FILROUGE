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

        /* Add Button Styles */
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

        /* Plant Actions */
        .plant-actions {
            display: flex;
            gap: 8px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .action-btn {
            flex: 1;
            min-width: 80px;
            padding: 8px 10px;
            border: none;
            border-radius: 5px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            transition: all 0.2s;
        }

        .details-btn {
            background-color: var(--secondary);
            color: white;
        }

        .details-btn:hover {
            background-color: #F57C00;
        }

        .edit-btn {
            background-color: var(--primary-light);
            color: var(--primary-dark);
        }

        .edit-btn:hover {
            background-color: var(--primary);
            color: white;
        }

        .delete-btn {
            background-color: #FFEBEE;
            color: #C62828;
        }

        .delete-btn:hover {
            background-color: #C62828;
            color: white;
        }

        /* Details View Styles */
        .details-view {
            display: none;
            width: 100%;
            padding: 20px;
        }

        .details-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 30px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .details-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .details-back-btn {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .details-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .details-image {
            height: 350px;
            border-radius: 10px;
            overflow: hidden;
        }

        .details-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .details-info {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .details-title {
            font-size: 28px;
            color: var(--primary-dark);
        }

        .details-meta {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .details-meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-light);
        }

        .details-description {
            line-height: 1.6;
        }

        .details-stages {
            margin-top: 20px;
        }

        .stage-item {
            margin-bottom: 15px;
        }

        .stage-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .stage-title {
            font-weight: 600;
        }

        .stage-date {
            color: var(--text-light);
            font-size: 14px;
        }

        .stage-progress {
            height: 8px;
            background-color: #eee;
            border-radius: 4px;
            overflow: hidden;
        }

        .stage-progress-bar {
            height: 100%;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-title {
            font-size: 20px;
            font-weight: 600;
            color: var(--primary-dark);
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--text-light);
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
            border-radius: 5px;
            font-size: 14px;
        }

        .form-select {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            background-color: white;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 16px;
        }

        .form-submit {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            width: 100%;
            transition: background-color 0.3s;
        }

        .form-submit:hover {
            background-color: var(--primary-dark);
        }

        .image-preview {
            width: 100%;
            height: 150px;
            background-color: #f5f5f5;
            border-radius: 5px;
            margin-top: 10px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-preview img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .image-preview-placeholder {
            color: #999;
            text-align: center;
            padding: 20px;
        }

        /* Confirmation Modal */
        .confirmation-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .confirmation-content {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .confirmation-buttons {
            display: flex;
            gap: 15px;
            margin-top: 25px;
            justify-content: center;
        }

        .confirm-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
        }

        .confirm-delete {
            background-color: #C62828;
            color: white;
        }

        .confirm-cancel {
            background-color: #E0E0E0;
            color: #333;
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

            .plant-actions {
                flex-direction: column;
            }

            .details-content {
                grid-template-columns: 1fr;
            }

            .details-image {
                height: 250px;
            }
        }

        @media (max-width: 480px) {
            .action-btn {
                flex: 1 0 calc(50% - 8px);
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
            <button class="add-button" id="addButton">
                <i class="fas fa-plus"></i>
                Ajouter
            </button>
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
                <div class="plant-card" data-id="{{ $calendar->id }}">
                    <div class="plant-image">
                        <img src="{{ $calendar->image }}" alt="{{ $calendar->name }}">
                        <div class="plant-status">{{ $calendar->etapes }}</div>
                    </div>
                    <div class="plant-info">
                        <h3 class="plant-title">{{ $calendar->name }}</h3>
                        <div class="plant-details">
                            <div class="plant-detail">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                {{ $calendar->type ?? 'N/A' }}
                            </div>
                            <div class="plant-detail">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
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
                        <!-- Action buttons -->
                        <div class="plant-actions">
                            <a class="action-btn details-btn" href="/agriculteur/entries/{{ $calendar->id}}" >
                                <i class="fas fa-eye"></i>
                                Détails
                            </a>
                            <button class="action-btn edit-btn" onclick="openEditModal('{{ $calendar->id }}')">
                                <i class="fas fa-edit"></i>
                                Modifier
                            </button>
                            <button class="action-btn delete-btn" onclick="confirmDelete('{{ $calendar->id }}')">
                                <i class="fas fa-trash"></i>
                                Supprimer
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Details View -->


    <!-- Add Form Modal -->
    <div class="modal" id="addModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Ajouter une fiche explicative</h3>
                <button class="close-btn" id="closeModal">&times;</button>
            </div>
            <form id="addForm" action="{{ route('calendrier.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="image_url" class="form-label">URL de l'image</label>
                    <input type="url" id="image_url" name="image" class="form-input"
                        placeholder="Entrez l'URL de l'image" required>
                    <div class="image-preview" id="imagePreview">
                        <div class="image-preview-placeholder">Aperçu de l'image apparaîtra ici</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" id="name" name="name" class="form-input" placeholder="Entrez le nom de la fiche"
                        required>
                </div>
                <div class="form-group">
                    <label for="etapes" class="form-label">Étapes</label>
                    <select id="etapes" name="etapes" class="form-select" required>
                        <option value="">Sélectionnez une étape</option>
                        <option value="Semis">Semis</option>
                        <option value="Irrigation">Irrigation</option>
                        <option value="Récolte">Récolte</option>
                    </select>
                </div>
                <button type="submit" class="form-submit">Enregistrer</button>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="confirmation-modal" id="deleteModal">
        <div class="confirmation-content">
            <h3>Confirmer la suppression</h3>
            <p>Êtes-vous sûr de vouloir supprimer cette fiche explicative ? Cette action est irréversible.</p>
            <div class="confirmation-buttons">
                <button class="confirm-btn confirm-cancel" onclick="closeDeleteModal()">Annuler</button>
                    <form id="confirmDeleteform" action="" method="post">
                        @csrf
                        @method('DELETE')
                    <button class="confirm-btn confirm-delete" id="confirmDeleteBtn">Supprimer</button>
                    </form>
            </div>
        </div>
    </div>

    <!-- Edit Form Modal -->
    <div class="modal" id="editModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Modifier la fiche explicative</h3>
                <button class="close-btn" id="closeEditModal">&times;</button>
            </div>
            <form id="editForm" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="edit_image_url" class="form-label">URL de l'image</label>
                    <input type="url" id="edit_image_url" name="image" class="form-input"
                        placeholder="Entrez l'URL de l'image" required>
                    <div class="image-preview" id="editImagePreview">
                        <div class="image-preview-placeholder">Aperçu de l'image apparaîtra ici</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_name" class="form-label">Nom</label>
                    <input type="text" id="edit_name" name="name" class="form-input"
                        placeholder="Entrez le nom de la fiche" required>
                </div>
                <div class="form-group">
                    <label for="edit_etapes" class="form-label">Étapes</label>
                    <select id="edit_etapes" name="etapes" class="form-select" required>
                        <option value="">Sélectionnez une étape</option>
                        <option value="Semis">Semis</option>
                        <option value="Irrigation">Irrigation</option>
                        <option value="Récolte">Récolte</option>
                    </select>
                </div>
                <button type="submit" class="form-submit">Mettre à jour</button>
            </form>
        </div>
    </div>

    <script>

        const addButton = document.getElementById('addButton');
        const addModal = document.getElementById('addModal');
        const closeModal = document.getElementById('closeModal');
        const addForm = document.getElementById('addForm');
        const imageUrlInput = document.getElementById('image_url');
        const imagePreview = document.getElementById('imagePreview');

        // Show modal when add button is clicked
        addButton.addEventListener('click', function () {
            addModal.style.display = 'flex';
        });

        // Hide modal when close button is clicked
        closeModal.addEventListener('click', function () {
            addModal.style.display = 'none';
        });

        // Hide modal when clicking outside the modal content
        window.addEventListener('click', function (event) {
            if (event.target === addModal) {
                addModal.style.display = 'none';
            }
        });

        // Update image preview when URL changes
        imageUrlInput.addEventListener('input', function () {
            const url = this.value.trim();
            if (url) {
                imagePreview.innerHTML = `<img src="${url}" alt="Preview" onerror="this.onerror=null;this.parentElement.innerHTML='<div class=\'image-preview-placeholder\'>Image non disponible</div>'">`;
            } else {
                imagePreview.innerHTML = '<div class="image-preview-placeholder">Aperçu de l\'image apparaîtra ici</div>';
            }
        });

        // Delete functionality
        let currentDeleteId = null;

        function confirmDelete(id) {
            currentDeleteId = id;
            document.getElementById('deleteModal').style.display = 'flex';
            document.getElementById('confirmDeleteform').action =  `/agriculteur/Calendrier/delete/${id}`;
        }






        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
            currentDeleteId = null;
        }



        // Edit functionality
        function openEditModal(id) {
            const plantCard = document.querySelector(`.plant-card[data-id="${id}"]`);

            document.getElementById('editForm').action = `/agriculteur/Calendrier/update/${id}`;

            document.getElementById('edit_name').value = plantCard.querySelector('.plant-title').textContent;

            const currentStage = plantCard.querySelector('.plant-status').textContent;
            document.getElementById('edit_etapes').value = currentStage;

            const currentImageUrl = plantCard.querySelector('.plant-image img').src;
            document.getElementById('edit_image_url').value = currentImageUrl;

            document.getElementById('editImagePreview').innerHTML = `<img src="${currentImageUrl}" alt="Preview">`;

            document.getElementById('editModal').style.display = 'flex';
        }

        document.getElementById('closeEditModal').addEventListener('click', function () {
            document.getElementById('editModal').style.display = 'none';
        });

        window.addEventListener('click', function (event) {
            if (event.target === document.getElementById('editModal')) {
                document.getElementById('editModal').style.display = 'none';
            }
        });

        document.getElementById('edit_image_url').addEventListener('input', function () {
            const url = this.value.trim();
            const preview = document.getElementById('editImagePreview');
            if (url) {
                preview.innerHTML = `<img src="${url}" alt="Preview" onerror="this.onerror=null;this.parentElement.innerHTML='<div class=\'image-preview-placeholder\'>Image non disponible</div>'">`;
            } else {
                preview.innerHTML = '<div class="image-preview-placeholder">Aperçu de l\'image apparaîtra ici</div>';
            }
        });
    </script>
</body>

</html>