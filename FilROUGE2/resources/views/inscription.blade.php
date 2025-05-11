<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - AgriSupport</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f9f5;
            color: #333;
            line-height: 1.6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .signup-container {
            width: 100%;
            max-width: 500px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }

        .signup-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .signup-header h1 {
            color: #2e7d32;
            font-size: 1.8rem;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .signup-header p {
            color: #666;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
            font-size: 0.9rem;
        }

        .form-group.required label:after {
            content: " *";
            color: #e74c3c;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 40px;
            color: #777;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 0.9rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #2e7d32;
            outline: none;
            box-shadow: 0 0 0 3px rgba(46, 125, 50, 0.2);
        }

        .select-wrapper {
            position: relative;
        }

        .select-wrapper:after {
            content: "▼";
            font-size: 12px;
            color: #777;
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }

        select.form-control {
            appearance: none;
            padding-right: 30px;
        }

        .password-strength {
            margin-top: 5px;
            height: 4px;
            background: #eee;
            border-radius: 2px;
            overflow: hidden;
        }

        .password-strength-bar {
            height: 100%;
            width: 0%;
            background: #e74c3c;
            transition: width 0.3s, background 0.3s;
        }

        .btn-signup {
            width: 100%;
            background-color: #2e7d32;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-signup:hover {
            background-color: #45a049;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #666;
            font-size: 0.9rem;
        }

        .login-link a {
            color: #2e7d32;
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: #e74c3c;
            font-size: 0.8rem;
            margin-top: 5px;
            display: none;
        }

        /* Responsive */
        @media (max-width: 480px) {
            body {
                padding: 15px;
            }
            
            .signup-container {
                padding: 30px 20px;
            }
            
            .signup-header h1 {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <div class="signup-header">
            <h1>
                <i class="fas fa-user-plus"></i>
                Créer un compte
            </h1>
            <p>Rejoignez notre communauté agricole</p>
        </div>
        
        <form id="signupForm" method="POST" action="{{ route('inscription') }}" >

        @csrf
            <!-- Nom complet -->
            <div class="form-group required">
                <label for="name">Nom complet</label>
                <i class="fas fa-user input-icon"></i>
                <input type="text" id="name" name="name" class="form-control" placeholder="Votre nom complet" required>
                <div class="error-message" id="name-error"></div>
            </div>
            
            <!-- Email -->
            <div class="form-group required">
                <label for="email">Adresse Email</label>
                <i class="fas fa-envelope input-icon"></i>
                <input type="email" id="email" name="email" class="form-control" placeholder="votre@email.com" required>
                <div class="error-message" id="email-error"></div>
            </div>
            
            <!-- Type d'utilisateur -->
            <div class="form-group required">
                <label for="user_type">Vous êtes</label>
                <div class="select-wrapper">
                    <select id="user_type" name="user_type" class="form-control" required>
                        <option value="" disabled selected>Sélectionnez votre profil</option>
                        <option value="agriculteur">Agriculteur</option>
                        <option value="agricoles">Professionnel des filières agricoles</option>
                    </select>
                </div>
                <div class="error-message" id="type-error"></div>
            </div>
            
            <!-- Mot de passe -->
            <div class="form-group required">
                <label for="password">Mot de passe</label>
                <i class="fas fa-lock input-icon"></i>
                <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
                <div class="password-strength">
                    <div class="password-strength-bar" id="password-strength-bar"></div>
                </div>
                <div class="error-message" id="password-error"></div>
            </div>
            
            <!-- Confirmation mot de passe -->
            <div class="form-group required">
                <label for="password_confirmation">Confirmez le mot de passe</label>
                <i class="fas fa-lock input-icon"></i>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="••••••••" required>
                <div class="error-message" id="confirm-error"></div>
            </div>
            
            <button type="submit" class="btn-signup">
                <i class="fas fa-user-check"></i> S'inscrire
            </button>
            
            <div class="login-link">
                Déjà inscrit ? <a href="{{ route('login') }}">Connectez-vous</a>
            </div>
        </form>
    </div>

    <script>
        // Password strength indicator
        document.getElementById('password').addEventListener('input', function(e) {
            const password = e.target.value;
            const strengthBar = document.getElementById('password-strength-bar');
            let strength = 0;
            
            if (password.length > 0) strength += 1;
            if (password.length >= 8) strength += 1;
            if (/[A-Z]/.test(password)) strength += 1;
            if (/[0-9]/.test(password)) strength += 1;
            if (/[^A-Za-z0-9]/.test(password)) strength += 1;
            
            // Update width and color
            const width = strength * 20;
            strengthBar.style.width = width + '%';
            
            if (strength <= 2) {
                strengthBar.style.backgroundColor = '#e74c3c';
            } else if (strength <= 4) {
                strengthBar.style.backgroundColor = '#f39c12';
            } else {
                strengthBar.style.backgroundColor = '#2ecc71';
            }
        });
        
        // Form validation
        document.getElementById('signupForm').addEventListener('submit', function(e) {

            let isValid = true;
            
            // Reset errors
            document.querySelectorAll('.error-message').forEach(el => {
                el.style.display = 'none';
            });
            
            // Validate name
            const name = document.getElementById('name').value.trim();
            if (name === '') {
                document.getElementById('name-error').textContent = 'Veuillez entrer votre nom';
                document.getElementById('name-error').style.display = 'block';
                isValid = false;
            }
            
            // Validate email
            const email = document.getElementById('email').value.trim();
            if (email === '') {
                document.getElementById('email-error').textContent = 'Veuillez entrer votre email';
                document.getElementById('email-error').style.display = 'block';
                isValid = false;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                document.getElementById('email-error').textContent = 'Veuillez entrer un email valide';
                document.getElementById('email-error').style.display = 'block';
                isValid = false;
            }
            
          
            const userType = document.getElementById('user_type').value;
            if (!userType) {
                document.getElementById('type-error').textContent = 'Veuillez sélectionner votre profil';
                document.getElementById('type-error').style.display = 'block';
                isValid = false;
            }
            
            
            const password = document.getElementById('password').value;
            if (password === '') {
                document.getElementById('password-error').textContent = 'Veuillez entrer un mot de passe';
                document.getElementById('password-error').style.display = 'block';
                isValid = false;
            } else if (password.length < 8) {
                document.getElementById('password-error').textContent = 'Le mot de passe doit contenir au moins 8 caractères';
                document.getElementById('password-error').style.display = 'block';
                isValid = false;
            }
            
            
            const passwordConfirm = document.getElementById('password_confirmation').value;
            if (passwordConfirm === '') {
                document.getElementById('confirm-error').textContent = 'Veuillez confirmer votre mot de passe';
                document.getElementById('confirm-error').style.display = 'block';
                isValid = false;
            } else if (passwordConfirm !== password) {
                document.getElementById('confirm-error').textContent = 'Les mots de passe ne correspondent pas';
                document.getElementById('confirm-error').style.display = 'block';
                isValid = false;
            }
            
          
            if (isValid) {
                // alert('Inscription réussie !');

                this.submit();
            }
        });
    </script>
</body>
</html>