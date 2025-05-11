<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriVision - Gestion Agricole</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/agriculteur/etepes.css') }}">


</head>

<body>


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

            <a class="menu-item active" href="{{ route('user') }}">
                <div class="menu-icon"><i class="fas fa-envelope"></i></div>
                <span class="menu-text">Messages</span>
            </a>
            <a class="menu-item " href="{{ route('agriculteur.FichesExplicatives') }}">
                <div class="menu-icon"><i class="fas fa-file-alt"></i></div>
                <span class="menu-text">Fiches Explicatives</span>
            </a>
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
            <form id="stageForm" action="{{ route('calendar.entries.store') }}" method="post">
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
                <input type="hidden" name="id_culture" value="{{ $calendar->id }}">

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
                    <input type="hidden" name="id_culture" value="{{ $calendar->id }}">
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
                <form id="problemReportForm" action="{{route('signalers.store')}}" method="post"  enctype="multipart/form-data" >
                @csrf
                    <div class="form-group">
                        <div class="image-preview" id="imagePreview">
                            <img id="previewImage"  src="" alt="Preview">
                            <label for="problemImage" class="image-upload-label">
                                <i class="fas fa-camera"></i>
                                Ajouter une photo
                            </label>
                        </div>
                        <input type="file" id="problemImage" name="image"  style="display: none;">
                    </div>

                    <div class="form-group">
                        <label for="problemName" class="form-label">Nom du problème</label>
                        <input type="text" name="name" class="form-input" required>
                    </div>

                    
                        <input type="hidden" id="problemCalendarId" name="id_culture" value="{{ $calendar->id }}" class="form-input" required>
                    

                    <div class="form-group">
                        <label for="problemDescription" class="form-label">Description</label>
                        <textarea id="problemDescription" name="description" class="form-textarea" required></textarea>
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

@if(session('success'))
    <script>
        alert("{{ session('success') }}");

    </script>

@endif

@if ($errors->any())
    <script>
        let errors = @json($errors->all());
        alert(errors.join("\n"));
    </script>
@endif




</body>
</html>