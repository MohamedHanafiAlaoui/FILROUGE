<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion FAQ</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://kit.fontawesome.com/your-kit-code.js" crossorigin="anonymous"></script>
    <style>
        .error-message { color: #dc3545; font-size: 0.875em; }
        .form-container { background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 30px; }
        .item { border: 1px solid #dee2e6; border-radius: 5px; margin-bottom: 15px; }
        .item-header { padding: 15px; background: #f8f9fa; display: flex; justify-content: space-between; }
        .item-content { padding: 15px; }
        .actions { display: flex; gap: 10px; }
        .empty-state { text-align: center; padding: 40px; color: #6c757d; }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="header">
            <h1>Gestion des Questions/Réponses</h1>
            <a href="{{ route('agricole.historique-questions') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nouvelle FAQ
            </a>
        </div>

        <div class="content-container">
            <!-- Formulaire unique pour create/update -->
            <div class="form-container">
                <h2>{{ $editingQuestion ? 'Modifier la FAQ' : 'Nouvelle FAQ' }}</h2>
                <form method="POST" 
                    action="{{ $editingQuestion 
                            ? route('agricole.historique-questions.update', $editingQuestion->id)
                            : route('agricole.historique-questions.store') }}">
                    @csrf
                    @if($editingQuestion)
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label>Question</label>
                        <input type="text" name="question" 
                               value="{{ old('question', optional($editingQuestion)->question ?? '') }}" 
                               required>
                        @error('question')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Réponse</label>
                        <textarea name="answer" required>{{ old('answer', optional($editingQuestion)->answer ?? '') }}</textarea>
                        @error('answer')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        {{ $editingQuestion ? 'Mettre à jour' : 'Créer' }}
                    </button>
                    
                    @if($editingQuestion)
                        <a href="{{ route('agricole.historique-questions') }}" class="btn">
                            Annuler
                        </a>
                    @endif
                </form>
            </div>

            <!-- Liste des questions -->
            <div class="list-container">
                @if($questions->isEmpty())
                    <div class="empty-state">
                        <p>Aucune question n'a été enregistrée</p>
                    </div>
                @else
                    @foreach($questions as $question)
                        <div class="item">
                            <div class="item-header">
                                <span>{{ $question->question }}</span>
                                <div class="actions">
                                    <a href="{{ route('agricole.historique-questions', ['edit' => $question->id]) }}" 
                                       class="btn-edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" 
                                          action="{{ route('agricole.historique-questions.destroy', $question->id) }}">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="item-content">{{ $question->answer }}</div>
                        </div>
                    @endforeach
                @endif

                {{ $questions->links() }}
            </div>
        </div>
    </div>

    <script>
        // Auto-scroll to form when editing
        @if($editingQuestion)
            window.scrollTo({
                top: document.querySelector('.form-container').offsetTop - 100,
                behavior: 'smooth'
            });
        @endif

        // Prevent double form submission
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                const submitButton = this.querySelector('button[type="submit"]');
                submitButton.setAttribute('disabled', 'true');
                submitButton.innerHTML = `
                    <i class="fas fa-spinner fa-spin"></i>
                    ${submitButton.textContent}
                `;
            });
        });
    </script>
</body>
</html>