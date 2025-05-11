<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Fiche Technique - AgriVision</title>
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
            padding: 20px 0;
            transition: width 0.3s ease;
        }

        .sidebar-header {
            padding: 0 15px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
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

        /* Main content styles */
        .main-content {
            flex: 1;
            padding: 30px;
            max-width: 1200px;
            margin: 0 auto;
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

        /* Form container */
        .form-container {
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
        }

        /* Form elements */
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
            border-radius: var(--border-radius);
            font-size: 16px;
            transition: var(--transition);
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

        /* Sections */
        .steps-section, .problems-section {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .section-title {
            font-size: 20px;
            margin-bottom: 15px;
            color: var(--primary-dark);
        }

        /* Cards */
        .step-card, .problem-card {
            background-color: #f9f9f9;
            border-radius: var(--border-radius);
            padding: 20px;
            margin-bottom: 15px;
            border-left: 3px solid var(--primary);
            transition: var(--transition);
        }

        .step-card:hover, .problem-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
        }

        .problem-card {
            border-left-color: var(--secondary);
            background-color: #fff9f9;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .card-title {
            font-weight: 600;
        }

        .remove-btn {
            color: var(--error);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
            transition: var(--transition);
        }

        .remove-btn:hover {
            transform: scale(1.1);
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

        /* Error handling */
        .error-message {
            color: var(--error);
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }

        .has-error .error-message {
            display: block;
        }

        .has-error .form-control {
            border-color: var(--error);
        }

        /* Responsive design */
        @media (max-width: 992px) {
            .sidebar {
                width: 80px;
            }
            
            .sidebar-title, .sidebar-subtitle {
                display: none;
            }
            
            .main-content {
                padding: 20px;
            }
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }
            
            .form-actions {
                flex-direction: column-reverse;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
            
            .header {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 576px) {
            body {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                height: auto;
                padding: 10px 0;
            }
            
            .main-content {
                padding: 15px;
            }
            
            .page-title {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-title">AgriVision</div>
            <div class="sidebar-subtitle">Gestion Technique</div>
        </div>
        <div class="sidebar-menu">
            <!-- Menu items would go here -->
        </div>
    </div>

    <div class="main-content">
        <div class="header">
            <h1 class="page-title">Modifier Fiche Technique</h1>
            <button class="btn btn-primary" id="saveBtn">
                <i class="fas fa-save"></i> Enregistrer
            </button>
        </div>

        <div class="form-container">
            <form id="ficheForm" action="{{ route('fiches.update', $fiche->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Basic Information Section -->
                <div class="form-group">
                    <label for="ficheName" class="form-label required">Titre de la fiche</label>
                    <input type="text" id="ficheName" name="name" class="form-control" 
                           value="{{ old('name', $fiche->name) }}" placeholder="Ex: Culture du maïs" required>
                    <div class="error-message" id="nameError">Ce champ est obligatoire</div>
                </div>

                <div class="form-group">
                    <label for="ficheDescription" class="form-label required">Description</label>
                    <textarea id="ficheDescription" name="description" class="form-control" 
                              placeholder="Description détaillée de la fiche" required>{{ old('description', $fiche->description) }}</textarea>
                    <div class="error-message" id="descriptionError">Ce champ est obligatoire</div>
                </div>

                <!-- Image Section -->
                <div class="form-group">
                    <label for="image" class="form-label required">Image illustrative</label>
                    <input type="text" id="image" name="image" class="form-control" 
                           value="{{ old('image', $fiche->image) }}" placeholder="URL de l'image" required>
                    <div class="error-message" id="imageError">Veuillez fournir une URL valide</div>
                </div>

                <!-- Steps Section -->
                <div class="steps-section">
                    <h3 class="section-title">Étapes Techniques</h3>
                    <button type="button" class="btn btn-secondary mb-3" id="addStepBtn">
                        <i class="fas fa-plus"></i> Ajouter une étape
                    </button>

                    <div id="stepsContainer">
                        @foreach($fiche->etapeTechniques as $index => $etape)
                        <div class="step-card">
                            <div class="card-header">
                                <h4 class="card-title">Étape {{ $index + 1 }}</h4>
                                <button type="button" class="remove-btn" title="Supprimer cette étape">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <div class="form-group">
                                <label class="form-label required">Nom de l'étape</label>
                                <input type="text" class="form-control" 
                                       name="etapes[{{ $index }}][nameetape]"
                                       value="{{ old("etapes.$index.nameetape", $etape->nameetape) }}"
                                       placeholder="Ex: Préparation du sol" required>
                                <div class="error-message">Ce champ est obligatoire</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" 
                                          name="etapes[{{ $index }}][descriptionetape]"
                                          placeholder="Description détaillée de l'étape">{{ old("etapes.$index.descriptionetape", $etape->descriptionetape) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label required">Durée estimée (jours)</label>
                                <input type="number" class="form-control" 
                                       name="etapes[{{ $index }}][duree_estimee]"
                                       value="{{ old("etapes.$index.duree_estimee", $etape->duree_estimee) }}"
                                       placeholder="Ex: 14" required>
                                <div class="error-message">Veuillez spécifier une durée</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Problems Section -->
                <div class="problems-section">
                    <h3 class="section-title">Problèmes Courants</h3>
                    <button type="button" class="btn btn-secondary mb-3" id="addProblemBtn">
                        <i class="fas fa-plus"></i> Ajouter un problème
                    </button>

                    <div id="problemsContainer">
                        @foreach($fiche->problems as $index => $problem)
                        <div class="problem-card">
                            <div class="card-header">
                                <h4 class="card-title">Problème {{ $index + 1 }}</h4>
                                <button type="button" class="remove-btn" title="Supprimer ce problème">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <div class="form-group">
                                <label class="form-label required">Symptômes</label>
                                <textarea class="form-control" 
                                          name="problems[{{ $index }}][symptoms]"
                                          placeholder="Décrire les symptômes observés" required>{{ old("problems.$index.symptoms", $problem->symptoms) }}</textarea>
                                <div class="error-message">Ce champ est obligatoire</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label required">Solutions</label>
                                <textarea class="form-control" 
                                          name="problems[{{ $index }}][solutions]"
                                          placeholder="Proposer des solutions" required>{{ old("problems.$index.solutions", $problem->solutions) }}</textarea>
                                <div class="error-message">Ce champ est obligatoire</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" id="cancelBtn">
                        <i class="fas fa-times"></i> Annuler
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Mettre à jour
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
            // Initialize counters based on existing items
            let stepCount = {{ $fiche->etapeTechniques->count() }};
            let problemCount = {{ $fiche->problems->count() }};

            // Add Step
            const addStepBtn = document.getElementById('addStepBtn');
            const stepsContainer = document.getElementById('stepsContainer');

            addStepBtn.addEventListener('click', function() {
                stepCount++;
                const stepHTML = `
                    <div class="step-card">
                        <div class="card-header">
                            <h4 class="card-title">Étape ${stepCount}</h4>
                            <button type="button" class="remove-btn" title="Supprimer cette étape">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                        <div class="form-group">
                            <label class="form-label required">Nom de l'étape</label>
                            <input type="text" class="form-control" 
                                   name="etapes[${stepCount}][nameetape]"
                                   placeholder="Ex: Préparation du sol" required>
                            <div class="error-message">Ce champ est obligatoire</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" 
                                      name="etapes[${stepCount}][descriptionetape]"
                                      placeholder="Description détaillée de l'étape"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label required">Durée estimée (jours)</label>
                            <input type="number" class="form-control" 
                                   name="etapes[${stepCount}][duree_estimee]"
                                   placeholder="Ex: 14" required>
                            <div class="error-message">Veuillez spécifier une durée</div>
                        </div>
                    </div>
                `;
                stepsContainer.insertAdjacentHTML('beforeend', stepHTML);
            });

            // Add Problem
            const addProblemBtn = document.getElementById('addProblemBtn');
            const problemsContainer = document.getElementById('problemsContainer');

            addProblemBtn.addEventListener('click', function() {
                problemCount++;
                const problemHTML = `
                    <div class="problem-card">
                        <div class="card-header">
                            <h4 class="card-title">Problème ${problemCount}</h4>
                            <button type="button" class="remove-btn" title="Supprimer ce problème">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                        <div class="form-group">
                            <label class="form-label required">Symptômes</label>
                            <textarea class="form-control" 
                                      name="problems[${problemCount}][symptoms]"
                                      placeholder="Décrire les symptômes observés" required></textarea>
                            <div class="error-message">Ce champ est obligatoire</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label required">Solutions</label>
                            <textarea class="form-control" 
                                      name="problems[${problemCount}][solutions]"
                                      placeholder="Proposer des solutions" required></textarea>
                            <div class="error-message">Ce champ est obligatoire</div>
                        </div>
                    </div>
                `;
                problemsContainer.insertAdjacentHTML('beforeend', problemHTML);
            });

            // Remove item
            document.addEventListener('click', function(e) {
                if (e.target.closest('.remove-btn')) {
                    const card = e.target.closest('.step-card, .problem-card');
                    if (card && confirm('Voulez-vous vraiment supprimer cet élément ?')) {
                        card.remove();
                        // Re-index remaining items
                        if (card.classList.contains('step-card')) {
                            const steps = stepsContainer.querySelectorAll('.step-card');
                            steps.forEach((step, index) => {
                                step.querySelector('.card-title').textContent = `Étape ${index + 1}`;
                                // Update all input names to maintain array order
                                const inputs = step.querySelectorAll('input, textarea');
                                inputs.forEach(input => {
                                    input.name = input.name.replace(/\[\d+\]/, `[${index}]`);
                                });
                            });
                            stepCount = steps.length;
                        } else {
                            const problems = problemsContainer.querySelectorAll('.problem-card');
                            problems.forEach((problem, index) => {
                                problem.querySelector('.card-title').textContent = `Problème ${index + 1}`;
                                // Update all input names to maintain array order
                                const inputs = problem.querySelectorAll('input, textarea');
                                inputs.forEach(input => {
                                    input.name = input.name.replace(/\[\d+\]/, `[${index}]`);
                                });
                            });
                            problemCount = problems.length;
                        }
                    }
                }
            });

            // Form validation
            const form = document.getElementById('ficheForm');
            form.addEventListener('submit', function(e) {
                let isValid = true;
                
                // Validate required fields
                const requiredFields = form.querySelectorAll('[required]');
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        field.closest('.form-group').classList.add('has-error');
                    } else {
                        field.closest('.form-group').classList.remove('has-error');
                    }
                });
                
                // Validate at least one problem exists
                if (problemCount < 1) {
                    isValid = false;
                    alert('Veuillez ajouter au moins un problème');
                }
                
                if (!isValid) {
                    e.preventDefault();
                    alert('Veuillez remplir tous les champs obligatoires');
                }
            });


        });
    </script>
</body>
</html>