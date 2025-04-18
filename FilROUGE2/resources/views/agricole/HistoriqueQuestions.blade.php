<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion FAQ Agricole</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./css/HistoriqueQuestions.css">
    <link rel="stylesheet" href="./css/Sidebar.css">

</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-menu">
            <div class="menu-item">
                <div class="menu-icon"><i class="fas fa-home"></i></div>
                <span class="tooltip">Accueil</span>
            </div>
            <div class="menu-item active">
                <div class="menu-icon"><i class="fas fa-question-circle"></i></div>
                <span class="tooltip">FAQ</span>
            </div>
            <div class="menu-item">
                <div class="menu-icon"><i class="fas fa-cog"></i></div>
                <span class="tooltip">Paramètres</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <div class="dashboard-title">Gestion des Questions/Réponses</div>
            <button class="btn btn-primary" id="newFaqBtn">
                <i class="fas fa-plus"></i> Nouvelle FAQ
            </button>
        </div>
        
        <div class="content-container">
            <!-- FAQ Form (hidden by default) -->
            <div class="form-container" id="faqForm" style="display: none;">
                <div class="form-title" id="formTitle">Ajouter une nouvelle FAQ</div>
                <form id="faqFormElement">
                    <input type="hidden" id="faqId">
                    <div class="form-group">
                        <label for="question">Question</label>
                        <input type="text" id="question" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="answer">Réponse</label>
                        <textarea id="answer" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submitBtn">Enregistrer</button>
                    <button type="button" class="btn" id="cancelBtn" style="margin-left: 10px;">Annuler</button>
                </form>
            </div>
            
            <!-- FAQ List -->
            <div class="list-container">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" id="faqSearch" placeholder="Rechercher des questions...">
                </div>
                
                <div id="faqItems">
                    <!-- FAQ items will be added here dynamically -->
                    <div class="empty-state">
                        <i class="fas fa-question-circle"></i>
                        <h3>Aucune question trouvée</h3>
                        <p>Commencez par ajouter une nouvelle question/réponse</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Delete Confirmation Modal -->
    <div class="modal" id="deleteModal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Confirmer la suppression</div>
                <button class="close-btn" id="closeDeleteModal">&times;</button>
            </div>
            <p id="deleteModalText">Êtes-vous sûr de vouloir supprimer cette question ? Cette action est irréversible.</p>
            <div class="modal-footer">
                <button class="btn" id="cancelDeleteBtn">Annuler</button>
                <button class="btn btn-danger" id="confirmDeleteBtn">Supprimer</button>
            </div>
        </div>
    </div>

    <script>
        // Sample data
        let faqs = [
            {
                id: 1,
                question: "Quand planter le blé d'hiver ?",
                answer: "La période idéale pour planter le blé d'hiver est entre mi-octobre et mi-novembre, lorsque la température du sol est d'environ 10-12°C."
            },
            {
                id: 2,
                question: "Comment traiter les maladies fongiques du maïs ?",
                answer: "Pour les maladies fongiques du maïs comme l'helminthosporiose, utiliser des fongicides à base de triazoles en prévention ou au tout début de l'infection. Une rotation des cultures est également recommandée."
            },
            {
                id: 3,
                question: "Quelle est la réglementation sur l'épandage de lisier ?",
                answer: "L'épandage de lisier est interdit du 15 novembre au 15 janvier. Les distances minimales sont de 50m des habitations et 35m des cours d'eau. Toujours vérifier les arrêtés préfectoraux locaux."
            }
        ];
        
        // DOM Elements
        const faqForm = document.getElementById('faqForm');
        const faqFormElement = document.getElementById('faqFormElement');
        const formTitle = document.getElementById('formTitle');
        const faqIdInput = document.getElementById('faqId');
        const questionInput = document.getElementById('question');
        const answerInput = document.getElementById('answer');
        const submitBtn = document.getElementById('submitBtn');
        const cancelBtn = document.getElementById('cancelBtn');
        const newFaqBtn = document.getElementById('newFaqBtn');
        const faqItems = document.getElementById('faqItems');
        const deleteModal = document.getElementById('deleteModal');
        const deleteModalText = document.getElementById('deleteModalText');
        const closeDeleteModal = document.getElementById('closeDeleteModal');
        const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
        
        // Current FAQ being deleted
        let currentFaqId = null;
        
        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            displayFaqs();
        });
        
        // Display FAQs
        function displayFaqs() {
            if (faqs.length === 0) {
                faqItems.innerHTML = `
                    <div class="empty-state">
                        <i class="fas fa-question-circle"></i>
                        <h3>Aucune question trouvée</h3>
                        <p>Commencez par ajouter une nouvelle question/réponse</p>
                    </div>
                `;
                return;
            }
            
            faqItems.innerHTML = '';
            
            faqs.forEach(faq => {
                const faqItem = document.createElement('div');
                faqItem.className = 'item';
                faqItem.innerHTML = `
                    <div class="item-header">
                        <span>${faq.question}</span>
                    </div>
                    <div class="item-content">${faq.answer}</div>
                    <div class="item-actions">
                        <button class="action-btn edit" data-id="${faq.id}">
                            <i class="fas fa-edit"></i> Modifier
                        </button>
                        <button class="action-btn delete" data-id="${faq.id}">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                    </div>
                `;
                faqItems.appendChild(faqItem);
            });
            
            // Add event listeners to edit buttons
            document.querySelectorAll('.action-btn.edit').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const id = parseInt(e.target.closest('button').getAttribute('data-id'));
                    editFaq(id);
                });
            });
            
            // Add event listeners to delete buttons
            document.querySelectorAll('.action-btn.delete').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const id = parseInt(e.target.closest('button').getAttribute('data-id'));
                    showDeleteModal(id);
                });
            });
        }
        
        // Show form to add new FAQ
        function showAddForm() {
            faqForm.style.display = 'block';
            formTitle.textContent = 'Ajouter une nouvelle FAQ';
            faqFormElement.reset();
            faqIdInput.value = '';
        }
        
        // Show form to edit FAQ
        function editFaq(id) {
            const faq = faqs.find(f => f.id == id);
            if (faq) {
                faqForm.style.display = 'block';
                formTitle.textContent = 'Modifier la FAQ';
                faqIdInput.value = faq.id;
                questionInput.value = faq.question;
                answerInput.value = faq.answer;
                
                // Scroll to form
                faqForm.scrollIntoView({ behavior: 'smooth' });
            }
        }
        
        // Show delete confirmation modal
        function showDeleteModal(id) {
            currentFaqId = id;
            const faq = faqs.find(f => f.id == id);
            deleteModalText.textContent = `Êtes-vous sûr de vouloir supprimer la question : "${faq.question}" ? Cette action est irréversible.`;
            deleteModal.style.display = 'flex';
        }
        
        // Hide delete confirmation modal
        function hideDeleteModal() {
            deleteModal.style.display = 'none';
            currentFaqId = null;
        }
        
        // Delete FAQ
        function deleteFaq() {
            faqs = faqs.filter(f => f.id != currentFaqId);
            displayFaqs();
            hideDeleteModal();
        }
        
        // Save FAQ (add or update)
        function saveFaq(e) {
            e.preventDefault();
            
            const question = questionInput.value.trim();
            const answer = answerInput.value.trim();
            
            if (!question || !answer) {
                alert('Veuillez remplir tous les champs');
                return;
            }
            
            const faqData = {
                question,
                answer
            };
            
            if (faqIdInput.value) {
                // Update existing FAQ
                const id = parseInt(faqIdInput.value);
                const index = faqs.findIndex(f => f.id === id);
                if (index !== -1) {
                    faqs[index] = { ...faqs[index], ...faqData };
                }
            } else {
                // Add new FAQ
                const newId = faqs.length > 0 ? Math.max(...faqs.map(f => f.id)) + 1 : 1;
                faqs.push({ id: newId, ...faqData });
            }
            
            // Reset form and update display
            faqFormElement.reset();
            faqForm.style.display = 'none';
            displayFaqs();
        }
        
        // Event Listeners
        newFaqBtn.addEventListener('click', showAddForm);
        faqFormElement.addEventListener('submit', saveFaq);
        cancelBtn.addEventListener('click', () => {
            faqForm.style.display = 'none';
            faqFormElement.reset();
        });
        
        // Delete modal events
        closeDeleteModal.addEventListener('click', hideDeleteModal);
        cancelDeleteBtn.addEventListener('click', hideDeleteModal);
        confirmDeleteBtn.addEventListener('click', deleteFaq);
        
        // Close modal when clicking outside
        deleteModal.addEventListener('click', (e) => {
            if (e.target === deleteModal) {
                hideDeleteModal();
            }
        });
    </script>
</body>
</html>