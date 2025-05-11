<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriVision - Créer Fiche Explicative</title>
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
            --sidebar-bg: #1B5E20;
            --error: #f44336;
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

        /* Sidebar styles (same as before) */
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
        }

        /* Header styles */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 600;
            color: var(--primary-dark);
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
        }

        .btn-secondary {
            background-color: var(--secondary);
            color: white;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #e68a00;
        }

        /* Form container */
        .form-container {
            background-color: var(--card-bg);
            border-radius: 10px;
            padding: 30px;
            box-shadow: var(--shadow);
            max-width: 800px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-label.required::after {
            content: " *";
            color: var(--error);
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 2px rgba(76, 175, 80, 0.2);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        /* Image upload */
        .image-upload {
            margin-bottom: 25px;
        }

        .image-preview {
            width: 100%;
            height: 200px;
            background-color: #f5f5f5;
            border: 2px dashed #ddd;
            border-radius: 5px;
            margin-top: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        .image-preview img {
            max-width: 100%;
            max-height: 100%;
            display: none;
        }

        .upload-icon {
            font-size: 48px;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .upload-text {
            color: var(--text-light);
            margin-bottom: 5px;
        }

        #imageUpload {
            display: none;
        }

        /* Steps section */
        .steps-section {
            margin-top: 30px;
        }

        .step-card {
            background-color: #f9f9f9;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
            border-left: 3px solid var(--primary);
        }

        .step-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .step-title {
            font-weight: 600;
        }

        .remove-step {
            color: var(--error);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
        }

        /* Problems section */
        .problems-section {
            margin-top: 30px;
        }

        .problem-card {
            background-color: #fff9f9;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
            border-left: 3px solid var(--error);
        }

        /* Form actions */
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        /* Error messages */
        .error-message {
            color: var(--error);
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }

        /* Responsive */

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

            .sidebar-title,
            .sidebar-subtitle {
                display: none;
            }

            .form-container {
                padding: 20px;
            }

            .form-actions {
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
            <h1 class="page-title">Créer une Fiche Explicative</h1>
            <button class="btn btn-primary" id="saveBtn">
                <i class="fas fa-save"></i> Enregistrer
            </button>
        </div>

        <div class="form-container">
            <form id="ficheForm" action="{{ route('fiches.store') }}" method="POST" enctype="multipart/form-data">
                @csrf


                <!-- Basic Information -->
                <div class="form-group">
                    <label for="ficheName" class="form-label required">Titre de la fiche</label>
                    <input type="text" id="ficheName" name="name" class="form-control" placeholder="Ex: Culture du maïs" required>
                    <div class="error-message" id="nameError">Veuillez entrer un titre pour la fiche</div>
                </div>



                <div class="form-group">
                    <label for="ficheDescription" class="form-label required">Description</label>
                    <textarea id="ficheDescription"  name="description" class="form-control" placeholder="Description détaillée de la fiche"
                        required></textarea>
                    <div class="error-message" id="descriptionError">Veuillez entrer une description</div>
                </div>

                <!-- Image Upload -->

                <div class="form-group">
                    <label for="image" class="form-label required">Image illustrative</label>
                    <input type="text" id="ficheName" name="image" class="form-control" placeholder="Image illustrative" required>
                    <div class="error-message" id="nameError">Veuillez entrer un titre pour la fiche</div>
                </div>

                <!-- Steps Section -->
                <div class="steps-section">
                    <h3>Étapes Techniques</h3>
                    <button type="button" class="btn btn-secondary" id="addStepBtn">
                        <i class="fas fa-plus"></i> Ajouter une étape
                    </button>

                    <div id="stepsContainer">
                        <!-- Steps will be added here -->
                        <div class="step-card">
                            <div class="step-header">
                                <h4 class="step-title">Étape 1</h4>
                                <button type="button" class="remove-step">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <div class="form-group">
                                <label class="form-label required">Nom de l'étape</label>
                                <input type="text" class="form-control" name="etapes[0][nameetape]"
                                    placeholder="Ex: Préparation du sol" required>
                                <div class="error-message">Veuillez entrer un nom pour l'étape</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label required">Description</label>
                                <textarea class="form-control" name="etapes[0][descriptionetape]"
                                    placeholder="Description détaillée de l'étape" required></textarea>
                                <div class="error-message">Veuillez entrer une description</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Durée estimée</label>
                                <input type="text" class="form-control" name="etapes[0][duree_estimee]"
                                    placeholder="Ex: 2 semaines">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Problems Section -->
                <div class="problems-section">
                    <h3>Problèmes Courants</h3>
                    <button type="button" class="btn btn-secondary" id="addProblemBtn">
                        <i class="fas fa-plus"></i> Ajouter un problème
                    </button>

                    <div id="problemsContainer">

                        <div class="problem-card">
                            <div class="step-header">
                                <h4 class="step-title">Problème 1</h4>
                                <button type="button" class="remove-step">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <div class="form-group">
                                <label class="form-label required">Symptômes</label>
                                <textarea class="form-control" name="problems[0][symptoms]"
                                    placeholder="Décrire les symptômes observés" required></textarea>
                                <div class="error-message">Veuillez décrire les symptômes</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label required">Solutions</label>
                                <textarea class="form-control" name="problems[0][solutions]"
                                    placeholder="Proposer des solutions" required></textarea>
                                <div class="error-message">Veuillez proposer des solutions</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" id="cancelBtn">
                        <i class="fas fa-times"></i> Annuler
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Enregistrer la fiche
                    </button>
                </div>
            </form>
        </div>
    </div>

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

    <script>

        document.addEventListener('DOMContentLoaded', function () {



            // Add Step
            const addStepBtn = document.getElementById('addStepBtn');
            const stepsContainer = document.getElementById('stepsContainer');
            let stepCount = 1;

            addStepBtn.addEventListener('click', function () {
                stepCount++;
                const stepHTML = `
                    <div class="step-card">
                        <div class="step-header">
                            <h4 class="step-title">Étape ${stepCount}</h4>
                            <button type="button" class="remove-step">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                        <div class="form-group">
                            <label class="form-label required">Nom de l'étape</label>
                            <input type="text" class="form-control" name="etapes[${stepCount}][nameetape]"   placeholder="Ex: Préparation du sol" required>
                            <div class="error-message">Veuillez entrer un nom pour l'étape</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label required">Description</label>
                            <textarea class="form-control" name="etapes[${stepCount}][descriptionetape]" placeholder="Description détaillée de l'étape" required></textarea>
                            <div class="error-message">Veuillez entrer une description</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Durée estimée</label>
                            <input type="text" name="etapes[${stepCount}][duree_estimee]" class="form-control" placeholder="Ex: 2 semaines">
                        </div>
                    </div>
                `;
                stepsContainer.insertAdjacentHTML('beforeend', stepHTML);
            });

            // Add Problem
            const addProblemBtn = document.getElementById('addProblemBtn');
            const problemsContainer = document.getElementById('problemsContainer');
            let problemCount = 1;

            addProblemBtn.addEventListener('click', function () {
                problemCount++;
                const problemHTML = `
                    <div class="problem-card">
                        <div class="step-header">
                            <h4 class="step-title">Problème ${problemCount}</h4>
                            <button type="button" class="remove-step">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                        <div class="form-group">
                            <label class="form-label required">Symptômes</label>
                            <textarea class="form-control" name="problems[${problemCount}][symptoms]"   placeholder="Décrire les symptômes observés" required></textarea>
                            <div class="error-message">Veuillez décrire les symptômes</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label required">Solutions</label>
                            <textarea class="form-control" name="problems[${problemCount}][solutions]"  placeholder="Proposer des solutions" required></textarea>
                            <div class="error-message">Veuillez proposer des solutions</div>
                        </div>
                    </div>
                `;
                problemsContainer.insertAdjacentHTML('beforeend', problemHTML);
            });

            document.addEventListener('click', function (e) {
                if (e.target.closest('.remove-step')) {
                    const card = e.target.closest('.step-card, .problem-card');
                    if (card) {
                        if (confirm('Voulez-vous vraiment supprimer cette section ?')) {
                            card.remove();
                            // Re-number remaining items
                            if (card.classList.contains('step-card')) {
                                const steps = stepsContainer.querySelectorAll('.step-card');
                                steps.forEach((step, index) => {
                                    step.querySelector('.step-title').textContent = `Étape ${index + 1}`;
                                });
                                stepCount = steps.length;
                            } else {
                                const problems = problemsContainer.querySelectorAll('.problem-card');
                                problems.forEach((problem, index) => {
                                    problem.querySelector('.step-title').textContent = `Problème ${index + 1}`;
                                });
                                problemCount = problems.length;
                            }
                        }
                    }
                }
            });


            document.getElementById('cancelBtn').addEventListener('click', function () {
                if (confirm('Voulez-vous vraiment annuler ? Toutes les modifications seront perdues.')) {
                    window.location.href = '/fiches';
                }
            });
        });
    </script>
</body>

</html>