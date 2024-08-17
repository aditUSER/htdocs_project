<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .message {
            font-size: 24px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="message">
        Terima kasih telah berkunjung
    </div>
    <script>
        setTimeout(function(){
            window.location.href = 'LoginForm.php';
        }, 5000); // Redirect setelah 5 detik
    </script>
</body>
</html>
