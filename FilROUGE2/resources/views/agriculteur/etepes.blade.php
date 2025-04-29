<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriVision - Gestion Agricole</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        /* ============ SIDEBAR ============ */
        .sidebar {
            width: 250px;
            background-color: var(--sidebar-bg);
            color: white;
            padding: 20px 0;
            transition: all 0.3s ease;
        }

        .sidebar-header {
            padding: 0 20px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
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
            padding: 20px 0;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .menu-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .menu-item.active {
            background-color: var(--primary);
        }

        .menu-icon {
            margin-right: 10px;
            font-size: 18px;
        }

        .menu-text {
            font-size: 16px;
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

        /* ============ FORMULAIRE AJOUT/ÉDITION ÉTAPE ============ */
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

        .edit-btn,
        .delete-btn {
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

        /* ============ MODALS ============ */
        .modal-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-container.active {
            display: flex;
        }

        .modal-form {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .modal-title {
            font-size: 22px;
            margin-bottom: 20px;
            color: var(--primary-dark);
            text-align: center;
        }

        .image-preview {
            width: 100%;
            height: 150px;
            background-color: #f5f5f5;
            border: 1px dashed #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .image-preview img {
            max-width: 100%;
            max-height: 100%;
            display: none;
        }

        .image-upload-label {
            display: block;
            text-align: center;
            cursor: pointer;
            color: var(--text-light);
        }

        .image-upload-label i {
            font-size: 40px;
            margin-bottom: 10px;
            display: block;
            color: var(--primary);
        }

        /* ============ RESPONSIVE ============ */
        @media (max-width: 768px) {
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

            .cancel-btn,
            .submit-btn {
                width: 100%;
            }

            .modal-form {
                width: 90%;
                padding: 20px;
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

    <div class="main-content">
        <!-- Top Section with Header -->
        <div class="top-section">
            <div class="page-header">
                <h1 class="page-title">Gestion des Étapes Agricoles</h1>
                <button class="add-button" id="showFormBtn">
                    <i class="fas fa-plus"></i>
                    Ajouter une Étape
                </button>
            </div>
        </div>

        <!-- Add Stage Form -->
        <div class="form-container" id="addStageForm">
            <h2 class="form-title">Ajouter une nouvelle étape</h2>
            <form id="stageForm" action="{{route('calendar.entries.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="stageName" class="form-label">Nom de l'étape</label>
                    <select id="stageName" name="id_etapes" class="form-input" required>
                        <option value="">Sélectionner une étape</option>
                        @foreach ($etapes as $etape)
                        <option value="{{ $etape->id }}">{{ $etape->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="id_Calendar" value="{{ $calendar->id }}">

                <div class="form-group">
                    <label for="stageDescription" class="form-label">Description</label>
                    <textarea id="stageDescription" name="description" class="form-textarea" required></textarea>
                </div>

                <div class="form-buttons">
                    <button type="button" class="cancel-btn" id="cancelFormBtn">Annuler</button>
                    <button type="submit" class="submit-btn">Enregistrer</button>
                </div>
            </form>
        </div>

        <!-- Edit Stage Modal -->
        <div class="modal-container" id="editFormContainer">
            <div class="modal-form">
                <h2 class="modal-title">Modifier l'étape</h2>
                <form id="editStageForm"  method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="editStageName" class="form-label">Nom de l'étape</label>
                        <select id="editStageName" name="id_etapes" class="form-input" required>
                            <option value="">Sélectionner une étape</option>
                            @foreach ($etapes as $etape)
                            <option value="{{ $etape->id }}">{{ $etape->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="id_Calendar" value="{{ $calendar->id }}">
                    <input type="hidden" id="editEntryId" name="id">

                    <div class="form-group">
                        <label for="editStageDescription" class="form-label">Description</label>
                        <textarea id="editStageDescription" name="description" class="form-textarea" required></textarea>
                    </div>

                    <div class="form-buttons">
                        <button type="button" class="cancel-btn" id="cancelEditFormBtn">Annuler</button>
                        <button type="submit" class="submit-btn">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Problem Report Modal -->
        <div class="modal-container" id="problemFormContainer">
            <div class="modal-form">
                <h2 class="modal-title">Signaler un problème</h2>
                <form id="problemReportForm">
                    <div class="form-group">
                        <div class="image-preview" id="imagePreview">
                            <img id="previewImage" src="" alt="Preview">
                            <label for="problemImage" class="image-upload-label">
                                <i class="fas fa-camera"></i>
                                Ajouter une photo
                            </label>
                        </div>
                        <input type="file" id="problemImage" accept="image/*" style="display: none;">
                    </div>

                    <div class="form-group">
                        <label for="problemName" class="form-label">Nom du problème</label>
                        <input type="text" id="problemName" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label for="problemCalendarId" class="form-label">ID Calendrier</label>
                        <input type="text" id="problemCalendarId" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label for="problemDescription" class="form-label">Description</label>
                        <textarea id="problemDescription" class="form-textarea" required></textarea>
                    </div>

                    <div class="form-buttons">
                        <button type="button" class="cancel-btn" id="cancelProblemFormBtn">Annuler</button>
                        <button type="submit" class="submit-btn">Signaler</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Plant Details Card -->
        <div class="plant-single-card">
            <div class="plant-header">
                <div class="plant-image">
                    <img src="{{ $calendar->image }}" alt="{{ $calendar->name }}">
                </div>
                <div class="plant-meta">
                    <div>
                        <h1 class="plant-title">{{ $calendar->name }}</h1>
                        <div class="plant-id">
                            <i class="fas fa-user-tag"></i> Agriculteur: AG001
                        </div>
                    </div>
                    <div class="plant-days">
                        <i class="fas fa-clock"></i> {{  $calendar->created_at }} jours restants
                    </div>
                </div>
            </div>

            <div class="plant-content">
                <p class="current-stage">
                    Étape actuelle: <strong>{{ $calendar->etapes ?? 'N/A' }}</strong>
                </p>
                <button class="signal-button" id="showProblemFormBtn">
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
                @foreach ($calendarEntries as $calendarEntrie)
                    <tr data-id="{{ $calendarEntrie->id }}" data-etape-id="{{ $calendarEntrie->id_etapes }}" data-description="{{ $calendarEntrie->description }}">
                        <td>{{ $calendarEntrie->etape->name }}</td>
                        <td>{{ $calendarEntrie->description }}</td>
                        <td>
                            <div class="action-buttons">
                                <button class="edit-btn" data-id="{{ $calendarEntrie->id }}">
                                    <i class="fas fa-edit"></i>
                                    Modifier
                                </button>
                                <button class="delete-btn" data-id="{{ $calendarEntrie->id }}">
                                    <i class="fas fa-trash"></i>
                                    Supprimer
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // Menu navigation
        const menuItems = document.querySelectorAll('.menu-item');
        menuItems.forEach(item => {
            item.addEventListener('click', () => {
                menuItems.forEach(i => i.classList.remove('active'));
                item.classList.add('active');
            });
        });

        // Add Stage Form Handling
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

        // Edit Stage Form Handling
        const editFormContainer = document.getElementById('editFormContainer');
        const cancelEditFormBtn = document.getElementById('cancelEditFormBtn');
        const editStageForm = document.getElementById('editStageForm');

        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const entryId = this.getAttribute('data-id');
                const row = this.closest('tr');
                const etapeId = row.getAttribute('data-etape-id');
                const description = row.getAttribute('data-description');
                
                document.getElementById('editEntryId').value = entryId;
                document.getElementById('editStageName').value = etapeId;
                document.getElementById('editStageDescription').value = description;
                
                editStageForm.action = `update/${entryId}`;
                editFormContainer.classList.add('active');
            });
        });

        cancelEditFormBtn.addEventListener('click', () => {
            editFormContainer.classList.remove('active');
        });


        // Problem Report Form Handling
        const showProblemFormBtn = document.getElementById('showProblemFormBtn');
        const problemFormContainer = document.getElementById('problemFormContainer');
        const cancelProblemFormBtn = document.getElementById('cancelProblemFormBtn');
        const problemReportForm = document.getElementById('problemReportForm');
        const problemImageInput = document.getElementById('problemImage');
        const imagePreview = document.getElementById('imagePreview');
        const previewImage = document.getElementById('previewImage');

        showProblemFormBtn.addEventListener('click', () => {
            problemFormContainer.classList.add('active');
        });

        cancelProblemFormBtn.addEventListener('click', () => {
            problemFormContainer.classList.remove('active');
            problemReportForm.reset();
            previewImage.style.display = 'none';
            imagePreview.querySelector('label').style.display = 'block';
        });

        problemReportForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const problemName = document.getElementById('problemName').value;
            const problemCalendarId = document.getElementById('problemCalendarId').value;
            const problemDescription = document.getElementById('problemDescription').value;

            alert(`Problème "${problemName}" signalé avec succès pour le calendrier ${problemCalendarId}`);
            problemReportForm.reset();
            problemFormContainer.classList.remove('active');
            previewImage.style.display = 'none';
            imagePreview.querySelector('label').style.display = 'block';
        });

        // Image preview functionality
        problemImageInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                    imagePreview.querySelector('label').style.display = 'none';
                }
                reader.readAsDataURL(file);
            }
        });



      
    </script>
</body>
</html>