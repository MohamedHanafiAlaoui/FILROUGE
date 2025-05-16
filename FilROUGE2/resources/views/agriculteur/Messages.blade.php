
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - Tableau de Bord Agricole</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('css/agriculteur/Messages.css') }}">


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


        <div class="messages-container">
            <!-- Conversations List -->
            <div class="conversations-list">
                <div class="conversations-header">
                    <div class="conversations-title">Conversations</div>
                </div>


                <div class="conversations-scroll">
                    @foreach ($users as $user)
                        <div class="conversation-item">
                            <div class="conversation-avatar">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                                <div class="status-indicator {{ $user->isOnline() ? 'status-online' : 'status-offline' }}">
                                </div>
                            </div>

                            <div class="conversation-content">
                                <div class="conversation-header">
                                    <div class="conversation-name">{{ $user->name }}</div>
                                    <form action="{{ route('chat') }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <button type="submit" class="message-action">
                                            <i class="fas fa-comment"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Message Area -->
            <div class="message-area">
                @if (!empty($messages))
                    <div class="message-header">
                        <div class="conversation-avatar">
                            {{ strtoupper(substr($receiver->name, 0, 2)) }}
                            <div class="status-indicator {{ $receiver->isOnline() ? 'status-online' : 'status-offline' }}">
                            </div>
                        </div>
                        <div class="message-recipient">{{ $receiver->name }}</div>
                        <div class="message-status">
                            {!! $receiver->isOnline() ? '<span>En ligne</span>' : '<span>Hors ligne</span>' !!}
                        </div>
                        <div class="message-actions">
                            <button class="message-action-btn">
                                <i class="fas fa-phone"></i>
                            </button>
                            <button class="message-action-btn">
                                <i class="fas fa-video"></i>
                            </button>
                            <button class="message-action-btn">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </div>

                    <div id="chat-box" class="message-body">
                        @foreach ($messages as $message)
                            <div class="message {{ $message->sender_id == auth()->id() ?   'sent' : 'received' }}">
                                <div class="message-content">
                                    {{ $message->content }}
                                </div>
                                <div class="message-actions-container">
                                    <button class="message-action" title="Répondre">
                                        <i class="fas fa-reply"></i>
                                    </button>
                                    <button class="message-action" title="Transférer">
                                        <i class="fas fa-share"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="message-time">{{ $message->created_at->format('H:i') }}</div>
                        @endforeach
                    </div>

                    <div class="message-input">
                        <div class="input-actions">
                            <form id="message-form" method="post" style="width: 100%; display: flex;">
                                @csrf
                                <input type="hidden" name="receiver_id" value="{{ $receiver->id }}">
                                <textarea placeholder="Écrivez un message..." name="content" id="messageInput"></textarea>
                                <button class="send-btn" id="sendBtn" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <line x1="22" y1="2" x2="11" y2="13"></line>
                                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="no-conversation">
                        <i class="fas fa-comments"></i>
                        <h3>Aucune conversation sélectionnée</h3>
                        <p>Sélectionnez une conversation existante ou démarrez-en une nouvelle</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {


            @if(isset($receiver))
                let receiverId = {{ $receiver->id }};
            @else
                let receiverId = null;
            @endif
            let senderId = {{ auth()->id() }};
            let chatBox = document.getElementById('chat-box');
            let messageForm = document.getElementById('message-form');
            let messageInput = document.getElementById('messageInput');



            // Set user online
            fetch('/agriculteur/messages/online', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}'
                }
            });

            // Listen for new messages



            window.Echo.private('chat.' + senderId)
                .listen('MessageSent', (e) => {
                    chatBox.innerHTML += `
                                                    <div class="message  received">
                                <div class="message-content">
                                    ${e.message.content}
                                </div>
                                <div class="message-actions-container">
                                    <button class="message-action" title="Répondre">
                                        <i class="fas fa-reply"></i>
                                    </button>
                                    <button class="message-action" title="Transférer">
                                        <i class="fas fa-share"></i>
                                    </button>
                                </div>
                            </div>

                        
                        `

                });


                // window.Echo.private('typing.' + receiverId)
                //     .listen('UserTyping', (e) => {
                //     console.log(e);


                //         });

            // Handle message form submission
            messageForm.addEventListener('submit', function (e) {
                e.preventDefault();
                const message = messageInput.value.trim();

                if (message) {
                    fetch('/agriculteur/messages/sendmessage', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            receiver_id: receiverId,
                            content: message
                        })
                    })

                    chatBox.innerHTML += `
                            <div class="message  sent">
                                <div class="message-content">
                                    ${message}
                                </div>
                                <div class="message-actions-container">
                                    <button class="message-action" title="Répondre">
                                        <i class="fas fa-reply"></i>
                                    </button>
                                    <button class="message-action" title="Transférer">
                                        <i class="fas fa-share"></i>
                                    </button>
                                </div>
                            </div>

                        
                        `

                        messageInput.value = '';
                    }
            });



            // Auto-resize textarea
            messageInput.addEventListener('input', function () {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });

        });
    </script>
</body>

</html>