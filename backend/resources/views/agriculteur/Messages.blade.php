<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - Tableau de Bord Agricole</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./css/Sidebar.css">
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
            --semis: #2196F3;
            --irrigation: #00BCD4;
            --recolte: #FFC107;
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
        
        .new-message-btn {
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 20px;
            padding: 8px 15px;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .new-message-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
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
            background-color: #f9f9f9;
            transform: translateX(5px);
        }
        
        .conversation-item.active, .conversation-item.unread {
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
        
        .conversation-time {
            font-size: 12px;
            color: var(--text-light);
            flex-shrink: 0;
            margin-left: 10px;
        }
        
        .conversation-preview {
            font-size: 14px;
            color: var(--text-light);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: flex;
            align-items: center;
        }
        
        .unread .conversation-name {
            font-weight: 700;
            color: var(--text);
        }
        
        .unread .conversation-preview {
            color: var(--text);
            font-weight: 500;
        }
        
        .unread-badge {
            background-color: var(--primary);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 10px;
            font-weight: bold;
            margin-left: 5px;
            flex-shrink: 0;
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
        
        .typing-indicator {
            display: flex;
            align-items: center;
            margin-left: 10px;
        }
        
        .typing-dot {
            width: 6px;
            height: 6px;
            background-color: var(--typing);
            border-radius: 50%;
            margin-right: 3px;
            animation: typingAnimation 1.4s infinite ease-in-out;
        }
        
        .typing-dot:nth-child(1) {
            animation-delay: 0s;
        }
        
        .typing-dot:nth-child(2) {
            animation-delay: 0.2s;
        }
        
        .typing-dot:nth-child(3) {
            animation-delay: 0.4s;
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
            background-image: linear-gradient(#f5f5f5 1px, transparent 1px);
            background-size: 100% 30px;
        }
        
        .message-date {
            text-align: center;
            margin: 20px 0;
            position: relative;
        }
        
        .date-label {
            display: inline-block;
            background-color: #e0e0e0;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            color: var(--text-light);
        }
        
        .message {
            margin-bottom: 15px;
            max-width: 70%;
            animation: fadeIn 0.3s ease;
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
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }
        
        .message.received .message-content {
            background-color: white;
            border-top-left-radius: 5px;
        }
        
        .message.sent .message-content {
            background-color: var(--primary);
            color: white;
            border-top-right-radius: 5px;
        }
        
        .message-time {
            font-size: 11px;
            color: var(--text-light);
            margin-top: 5px;
            text-align: right;
        }
        
        .message.sent .message-time {
            color: rgba(255,255,255,0.8);
        }
        
        .message-actions-container {
            display: none;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
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
            padding: 15px;
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
            height: 45px;
            max-height: 120px;
            font-family: inherit;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .message-input textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
        }
        
        .input-actions {
            display: flex;
            align-items: center;
            margin-right: 10px;
        }
        
        .input-action {
            background: none;
            border: none;
            color: var(--text-light);
            cursor: pointer;
            padding: 5px;
            transition: all 0.3s ease;
        }
        
        .input-action:hover {
            color: var(--primary);
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
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .send-btn:hover {
            background-color: var(--primary-dark);
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        
        .send-btn:disabled {
            background-color: #BDBDBD;
            cursor: not-allowed;
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
        
        .start-conversation-btn {
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
        }
        
        .start-conversation-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
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
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        @keyframes typingAnimation {
            0%, 60%, 100% { transform: translateY(0); }
            30% { transform: translateY(-5px); }
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .sidebar {
                width: 80px;
            }
            
            .sidebar-header, .menu-text {
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

    <!-- Main Content Area -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <div class="dashboard-title">Messages</div>
            <div class="header-icons">
                <div class="header-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                </div>
                <div class="header-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                    <div class="notification-badge">3</div>
                </div>
                <div class="header-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                </div>
            </div>
        </div>

        <!-- Messages Container -->
        <div class="messages-container">
            <!-- Conversations List -->
            <div class="conversations-list">
                <div class="conversations-header">
                    <div class="conversations-title">Conversations</div>
                    <button class="new-message-btn">
                        <i class="fas fa-plus"></i> Nouveau
                    </button>
                </div>
                
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Rechercher des messages...">
                </div>
                
                <div class="conversations-scroll">
                    <div class="conversation-item unread active">
                        <div class="conversation-avatar">JD
                            <div class="status-indicator status-online"></div>
                        </div>
                        <div class="conversation-content">
                            <div class="conversation-header">
                                <div class="conversation-name">Jean Dupont <span class="unread-badge">2</span></div>
                                <div class="conversation-time">10:30</div>
                            </div>
                            <div class="conversation-preview">Bonjour, concernant la livraison de tomates...</div>
                        </div>
                    </div>
                    
                    <div class="conversation-item unread">
                        <div class="conversation-avatar">MF
                            <div class="status-indicator status-typing"></div>
                        </div>
                        <div class="conversation-content">
                            <div class="conversation-header">
                                <div class="conversation-name">Marie Fontaine <span class="unread-badge">1</span></div>
                                <div class="conversation-time">Hier</div>
                            </div>
                            <div class="conversation-preview">Les résultats d'analyse du sol sont disponibles</div>
                        </div>
                    </div>
                    
                    <div class="conversation-item">
                        <div class="conversation-avatar">AG
                            <div class="status-indicator status-online"></div>
                        </div>
                        <div class="conversation-content">
                            <div class="conversation-header">
                                <div class="conversation-name">AgriTech Solutions</div>
                                <div class="conversation-time">Lun</div>
                            </div>
                            <div class="conversation-preview">Votre commande de semences a été expédiée</div>
                        </div>
                    </div>
                    
                    <div class="conversation-item">
                        <div class="conversation-avatar">PL
                            <div class="status-indicator status-away"></div>
                        </div>
                        <div class="conversation-content">
                            <div class="conversation-header">
                                <div class="conversation-name">Pierre Lambert</div>
                                <div class="conversation-time">12 juin</div>
                            </div>
                            <div class="conversation-preview">Merci pour le conseil sur l'irrigation</div>
                        </div>
                    </div>
                    
                    <div class="conversation-item">
                        <div class="conversation-avatar">CR
                            <div class="status-indicator status-offline"></div>
                        </div>
                        <div class="conversation-content">
                            <div class="conversation-header">
                                <div class="conversation-name">Coopérative Régionale</div>
                                <div class="conversation-time">5 juin</div>
                            </div>
                            <div class="conversation-preview">Rappel : Réunion le 15 juin à 14h</div>
                        </div>
                    </div>
                    
                    <div class="conversation-item">
                        <div class="conversation-avatar">TL
                            <div class="status-indicator status-offline"></div>
                        </div>
                        <div class="conversation-content">
                            <div class="conversation-header">
                                <div class="conversation-name">Technique Lab</div>
                                <div class="conversation-time">3 juin</div>
                            </div>
                            <div class="conversation-preview">Rapport d'analyse des sols disponible</div>
                        </div>
                    </div>
                    
                    <div class="conversation-item">
                        <div class="conversation-avatar">FR
                            <div class="status-indicator status-online"></div>
                        </div>
                        <div class="conversation-content">
                            <div class="conversation-header">
                                <div class="conversation-name">Fournisseur Régional</div>
                                <div class="conversation-time">1 juin</div>
                            </div>
                            <div class="conversation-preview">Nouveaux produits disponibles</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Message Area -->
            <div class="message-area">
                <div class="message-header">
                    <div class="conversation-avatar">JD
                        <div class="status-indicator status-online"></div>
                    </div>
                    <div class="message-recipient">Jean Dupont</div>
                    <div class="message-status">
                        <span>En ligne</span>
                        <div class="typing-indicator" id="typingIndicator">
                            <span>est en train d'écrire</span>
                            <div class="typing-dot"></div>
                            <div class="typing-dot"></div>
                            <div class="typing-dot"></div>
                        </div>
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
                
                <div class="message-body">
                    <div class="message-date">
                        <span class="date-label">Aujourd'hui</span>
                    </div>
                    
                    <div class="message received">
                        <div class="message-content">
                            Bonjour, je vous contacte concernant la livraison de tomates prévue pour vendredi. Serait-il possible d'avancer la date au jeudi ?
                        </div>
                        <div class="message-time">10:30</div>
                        <div class="message-actions-container">
                            <button class="message-action" title="Répondre">
                                <i class="fas fa-reply"></i>
                            </button>
                            <button class="message-action" title="Transférer">
                                <i class="fas fa-share"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="message sent">
                        <div class="message-content">
                            Bonjour Jean, je vais vérifier l'état de maturation avec l'équipe et je vous redis ça dans l'après-midi.
                        </div>
                        <div class="message-time">10:35</div>
                        <div class="message-actions-container">
                            <button class="message-action" title="Répondre">
                                <i class="fas fa-reply"></i>
                            </button>
                            <button class="message-action" title="Transférer">
                                <i class="fas fa-share"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="message received">
                        <div class="message-content">
                            Parfait, merci beaucoup. C'est pour un client important qui a avancé son événement.
                        </div>
                        <div class="message-time">10:36</div>
                        <div class="message-actions-container">
                            <button class="message-action" title="Répondre">
                                <i class="fas fa-reply"></i>
                            </button>
                            <button class="message-action" title="Transférer">
                                <i class="fas fa-share"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="message received">
                        <div class="message-content">
                            Je peux vous envoyer un échantillon aujourd'hui si vous voulez vérifier la qualité.
                        </div>
                        <div class="message-time">10:37</div>
                        <div class="message-actions-container">
                            <button class="message-action" title="Répondre">
                                <i class="fas fa-reply"></i>
                            </button>
                            <button class="message-action" title="Transférer">
                                <i class="fas fa-share"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="message-input">
                    <div class="input-actions">
                        <button class="input-action" title="Ajouter un fichier">
                            <i class="fas fa-paperclip"></i>
                        </button>
                        <button class="input-action" title="Ajouter une image">
                            <i class="fas fa-image"></i>
                        </button>
                    </div>
                    <textarea placeholder="Écrivez un message..." id="messageInput"></textarea>
                    <button class="send-btn" id="sendBtn" disabled>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add active class to conversation items when clicked
        const conversationItems = document.querySelectorAll('.conversation-item');
        conversationItems.forEach(item => {
            item.addEventListener('click', () => {
                conversationItems.forEach(i => i.classList.remove('active'));
                item.classList.add('active');
                
                // Simulate typing indicator for demo purposes
                const typingIndicator = document.getElementById('typingIndicator');
                typingIndicator.style.display = 'flex';
                
                setTimeout(() => {
                    typingIndicator.style.display = 'none';
                    
                    // Add a new received message after "typing"
                    const messageBody = document.querySelector('.message-body');
                    const newMessage = document.createElement('div');
                    newMessage.className = 'message received';
                    newMessage.innerHTML = `
                        <div class="message-content">
                            Super, merci pour votre réactivité. Je vous attends donc de vos nouvelles cet après-midi.
                        </div>
                        <div class="message-time">${new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}</div>
                        <div class="message-actions-container">
                            <button class="message-action" title="Répondre">
                                <i class="fas fa-reply"></i>
                            </button>
                            <button class="message-action" title="Transférer">
                                <i class="fas fa-share"></i>
                            </button>
                        </div>
                    `;
                    messageBody.appendChild(newMessage);
                    messageBody.scrollTop = messageBody.scrollHeight;
                }, 2000);
            });
        });
        
        // Add active class to menu items when clicked
        const menuItems = document.querySelectorAll('.menu-item');
        menuItems.forEach(item => {
            item.addEventListener('click', () => {
                menuItems.forEach(i => i.classList.remove('active'));
                item.classList.add('active');
            });
        });
        
        // Auto-resize textarea as user types
        const textarea = document.getElementById('messageInput');
        const sendBtn = document.getElementById('sendBtn');
        
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
            
            // Enable/disable send button based on input
            sendBtn.disabled = this.value.trim() === '';
        });
        
        // Send message when button is clicked
        sendBtn.addEventListener('click', function() {
            if (textarea.value.trim() !== '') {
                const messageBody = document.querySelector('.message-body');
                const newMessage = document.createElement('div');
                newMessage.className = 'message sent';
                newMessage.innerHTML = `
                    <div class="message-content">
                        ${textarea.value}
                    </div>
                    <div class="message-time">${new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}</div>
                    <div class="message-actions-container">
                        <button class="message-action" title="Répondre">
                            <i class="fas fa-reply"></i>
                        </button>
                        <button class="message-action" title="Transférer">
                            <i class="fas fa-share"></i>
                        </button>
                    </div>
                `;
                messageBody.appendChild(newMessage);
                textarea.value = '';
                textarea.style.height = '45px';
                sendBtn.disabled = true;
                messageBody.scrollTop = messageBody.scrollHeight;
                
                // Simulate reply after 1 second
                setTimeout(() => {
                    const typingIndicator = document.getElementById('typingIndicator');
                    typingIndicator.style.display = 'flex';
                    
                    setTimeout(() => {
                        typingIndicator.style.display = 'none';
                        
                        const replies = [
                            "Je vous remercie pour cette information.",
                            "Je prends note et je reviens vers vous.",
                            "Parfait, c'est noté !",
                            "Merci pour votre message, je traite votre demande.",
                            "Je vous confirme la réception de votre message."
                        ];
                        
                        const randomReply = replies[Math.floor(Math.random() * replies.length)];
                        
                        const replyMessage = document.createElement('div');
                        replyMessage.className = 'message received';
                        replyMessage.innerHTML = `
                            <div class="message-content">
                                ${randomReply}
                            </div>
                            <div class="message-time">${new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}</div>
                            <div class="message-actions-container">
                                <button class="message-action" title="Répondre">
                                    <i class="fas fa-reply"></i>
                                </button>
                                <button class="message-action" title="Transférer">
                                    <i class="fas fa-share"></i>
                                </button>
                            </div>
                        `;
                        messageBody.appendChild(replyMessage);
                        messageBody.scrollTop = messageBody.scrollHeight;
                    }, 2000);
                }, 1000);
            }
        });
        
        // Send message when Enter is pressed (but allow Shift+Enter for new lines)
        textarea.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                sendBtn.click();
            }
        });
        
        // Initially hide typing indicator
        document.getElementById('typingIndicator').style.display = 'none';
    </script>
</body>
</html>