<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Agricole</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/agriculteur/Calendrier.css') }}">


</head>

<body>
    <!-- Sidebar Section -->
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-title">AgriVision</div>
            <div class="sidebar-subtitle">Gestion des cultures</div>
        </div>
        <div class="sidebar-menu">

            <a class="menu-item active" href="{{ route('agriculteur.Calendrier') }}">
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
            <a class="menu-item " href="{{ route('agriculteur.FichesExplicatives') }}">
                <div class="menu-icon"><i class="fas fa-file-alt"></i></div>
                <span class="menu-text">Fiches Explicatives</span>
            </a>
            <div class="menu-item">

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button style="background: none;width: 100%;border: none;display: flex;color: white;}" type="submit">
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
                        <img src="{{ $calendar->image ? $calendar->image : "https://images.unsplash.com/photo-1582284540020-8acbe03f4924"}}"
                            alt="{{ $calendar->name }}">
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
                            <a class="action-btn details-btn" href="/agriculteur/entries/{{ $calendar->id}}">
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
            document.getElementById('confirmDeleteform').action = `/agriculteur/Calendrier/delete/${id}`;
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