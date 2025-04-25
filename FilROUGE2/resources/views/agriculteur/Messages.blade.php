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

    <style>
        :root {
            --primary: #4CAF50;
            --primary-dark: #388E3C;
            --primary-light: #C8E6C9;
            --primary-extra-light: #E8F5E9;
            --secondary: #FF9800;
            --background: #F5F5F5;
            --card-bg: #FFFFFF;
            --text: #333333;
            --text-light: #757575;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --shadow-hover: 0 8px 16px rgba(0, 0, 0, 0.12);
            --sidebar-bg: #1B5E20;
            --unread: #E3F2FD;
            --online: #4CAF50;
            --offline: #BDBDBD;
            --away: #FFC107;
            --typing: #00BCD4;
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

        /* Main Content Styles */
        .main-content {
            flex: 1;
            padding: 30px;
            position: relative;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            animation: fadeIn 0.5s ease;
        }

        .dashboard-title {
            font-size: 24px;
            font-weight: bold;
            position: relative;
        }

        .dashboard-title::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--primary);
            border-radius: 3px;
        }

        .header-icons {
            display: flex;
            gap: 15px;
        }

        .header-icon {
            width: 36px;
            height: 36px;
            background-color: var(--primary-light);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .header-icon:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-2px);
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #F44336;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 10px;
            font-weight: bold;
            animation: pulse 2s infinite;
        }

        /* Messages Container */
        .messages-container {
            display: flex;
            gap: 20px;
            height: calc(100vh - 150px);
            animation: fadeInUp 0.5s ease;
        }

        /* Conversations List */
        .conversations-list {
            width: 350px;
            background-color: var(--card-bg);
            border-radius: 12px;
            box-shadow: var(--shadow);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }

        .conversations-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
            background-color: var(--primary-extra-light);
        }

        .conversations-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--primary-dark);
        }

        .search-bar {
            position: relative;
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        .search-bar input {
            width: 100%;
            padding: 10px 15px 10px 35px;
            border: 1px solid #ddd;
            border-radius: 20px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .search-bar input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
        }

        .search-bar i {
            position: absolute;
            left: 28px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }

        .conversations-scroll {
            flex: 1;
            overflow-y: auto;
            padding: 5px;
        }

        .conversation-item {
            display: flex;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 5px;
            position: relative;
        }

        .conversation-item:hover {
            background-color: rgba(76, 175, 80, 0.05);
            transform: translateX(3px);
        }

        .conversation-item.active,
        .conversation-item.unread {
            background-color: var(--unread);
        }

        .conversation-item.active {
            box-shadow: inset 3px 0 0 var(--primary);
        }

        .conversation-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--primary-light);
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 12px;
            color: var(--primary-dark);
            font-weight: bold;
            font-size: 18px;
            position: relative;
            flex-shrink: 0;
        }

        .status-indicator {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 2px solid white;
        }

        .status-online {
            background-color: var(--online);
        }

        .status-offline {
            background-color: var(--offline);
        }

        .status-away {
            background-color: var(--away);
        }

        .status-typing {
            background-color: var(--typing);
            animation: pulse 1.5s infinite;
        }

        .conversation-content {
            flex: 1;
            min-width: 0;
        }

        .conversation-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .conversation-name {
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Message Area */
        .message-area {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: var(--card-bg);
            border-radius: 12px;
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .message-header {
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            background-color: var(--primary-extra-light);
        }

        .message-recipient {
            font-weight: 600;
            margin-left: 10px;
            color: var(--primary-dark);
        }

        .message-status {
            font-size: 12px;
            color: var(--text-light);
            margin-left: 10px;
            display: flex;
            align-items: center;
        }

        .message-actions {
            margin-left: auto;
            display: flex;
            gap: 10px;
        }

        .message-action-btn {
            background: none;
            border: none;
            color: var(--text-light);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .message-action-btn:hover {
            color: var(--primary);
        }

        .message-body {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            background-color: #fafafa;
            display: flex;
            flex-direction: column;
        }

        .message {
            margin-bottom: 15px;
            max-width: 75%;
            animation: fadeIn 0.4s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .message.received {
            align-self: flex-start;
        }

        .message.sent {
            align-self: flex-end;
        }

        .message-content {
            padding: 12px 15px;
            border-radius: 18px;
            position: relative;
            line-height: 1.4;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            word-break: break-word;
        }

        .message.received .message-content {
            background-color: white;
            border-top-left-radius: 5px;
            border-bottom-right-radius: 18px;
        }

        .message.sent .message-content {
            background-color: var(--primary);
            color: white;
            border-top-right-radius: 5px;
            border-bottom-left-radius: 18px;
        }

        .message-time {
            font-size: 11px;
            color: var(--text-light);
            margin-top: 4px;
            text-align: right;
            width: 100%;
            padding: 0 5px;
        }

        .message-actions-container {
            display: none;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 5px;
            z-index: 1;
        }

        .message:hover .message-actions-container {
            display: flex;
        }

        .message.received:hover .message-actions-container {
            right: -40px;
        }

        .message.sent:hover .message-actions-container {
            left: -40px;
        }

        .message-action {
            background: none;
            border: none;
            color: var(--text-light);
            cursor: pointer;
            padding: 5px;
            transition: all 0.3s ease;
        }

        .message-action:hover {
            color: var(--primary);
        }

        .message-input {
            width: 100%;
            padding: 15px 20px;
            border-top: 1px solid #eee;
            display: flex;
            align-items: center;
            background-color: white;
        }

        .message-input textarea {
            flex: 1;
            border: 1px solid #ddd;
            border-radius: 20px;
            padding: 12px 15px;
            resize: none;
            min-height: 45px;
            max-height: 120px;
            font-family: inherit;
            font-size: 14px;
            transition: all 0.3s ease;
            line-height: 1.4;
        }

        .message-input textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
        }

        .input-actions {
            width: 100%;
            display: flex;
            align-items: center;
            margin-right: 10px;
        }

        .send-btn {
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .send-btn:hover {
            background-color: var(--primary-dark);
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .no-conversation {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            color: var(--text-light);
            text-align: center;
            padding: 20px;
            animation: fadeIn 0.5s ease;
        }

        .no-conversation i {
            font-size: 50px;
            margin-bottom: 20px;
            color: #ddd;
        }

        .no-conversation h3 {
            margin-bottom: 10px;
            color: var(--text);
        }

        .no-conversation p {
            margin-bottom: 20px;
            max-width: 300px;
        }

        /* Scrollbar Styles */
        .conversations-scroll::-webkit-scrollbar,
        .message-body::-webkit-scrollbar {
            width: 6px;
        }

        .conversations-scroll::-webkit-scrollbar-track,
        .message-body::-webkit-scrollbar-track {
            background: var(--primary-extra-light);
        }

        .conversations-scroll::-webkit-scrollbar-thumb,
        .message-body::-webkit-scrollbar-thumb {
            background-color: var(--primary-light);
            border-radius: 3px;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        /* Responsive Design */
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

            .conversations-list {
                width: 300px;
            }
        }

        @media (max-width: 768px) {
            .messages-container {
                flex-direction: column;
                height: auto;
            }

            .conversations-list {
                width: 100%;
                margin-bottom: 20px;
            }

            .message-area {
                height: 500px;
            }

            .message {
                max-width: 85%;
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
            <a class="menu-item" href="{{ route('agriculteur.Calendrier') }}">
                <div class="menu-icon"><i class="fas fa-leaf"></i></div>
                <span class="menu-text">Cultures</span>
            </a>
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
                                                    <div class="message  sent">
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