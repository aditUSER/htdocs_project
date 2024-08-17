<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form with Session</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background: url('images/ppbc.jpg') repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
        }
        .login-container {
            margin-top: 10%;
        }
        .card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: white;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            border-radius: 25px;
            padding: 15px;
        }
        .form-control:focus {
            box-shadow: none;
            border: none;
        }
        .btn-primary {
            background-color: #ffffff;
            color: #6c757d;
            border-radius: 25px;
            padding: 10px;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #f8f9fa;
        }
        .btn-primary:active {
            transform: scale(0.95);
        }
        .custom-link {
            color: #ffffff;
            cursor: pointer;
        }
        .custom-link:hover {
            text-decoration: underline;
        }
        .checkbox-inline {
            display: flex;
            justify-content: space-between;
        }
        .remember-me {
            display: flex;
            align-items: center;
        }
        /* Animasi untuk pesan */
        .notification {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            opacity: 0;
            visibility: hidden;
            transition: all 0.5s ease;
        }
        .notification.show {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>
<body>
    <div class="container login-container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <!-- Menampilkan pesan error jika ada -->
                        <?php
                        session_start();
                        if (isset($_SESSION['error'])) {
                            echo "<div class='alert alert-danger text-center'>" . $_SESSION['error'] . "</div>";
                            unset($_SESSION['error']);
                        }
                        ?>
                        
                        <form action="loginMultiRoleSession.php" method="POST">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group checkbox-inline">
                                <div class="remember-me">
                                    <input type="checkbox" id="rememberMe" name="rememberMe">
                                    <label for="rememberMe" class="ml-2">Remember me</label>
                                </div>
                                <a href="#" class="custom-link" onclick="showNotification()">Forgot password?</a>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p>Don't have an account? <a href="#" class="custom-link" onclick="showNotification()">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Element untuk pesan notifikasi -->
    <div id="notification" class="notification">
        Perintah tidak dapat terlaksana
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- JavaScript untuk menampilkan animasi notifikasi -->
    <script>
        function showNotification() {
            var notification = document.getElementById('notification');
            notification.classList.add('show');
            setTimeout(function() {
                notification.classList.remove('show');
            }, 3000); // Animasi muncul selama 3 detik
        }
    </script>
</body>
</html>
