<?php
// --- Importowanie klasy User ---
require_once 'User.php';

session_start();

$user = new User();

// --- Obsługa rejestracji użytkownika ---
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Walidacja hasła
    if ($password !== $confirmPassword) {
        echo "<script>alert('Hasła muszą być takie same!');</script>";
    } elseif (strlen($password) < 6) {
        echo "<script>alert('Hasło musi mieć co najmniej 6 znaków!');</script>";
    } else {
        // Próba rejestracji użytkownika
        if ($user->register($username, $email, $password)) {
            echo "<script>alert('Rejestracja zakończona sukcesem! Możesz się teraz zalogować.'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Użytkownik z tym adresem e-mail już istnieje!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="style_registration.css">
</head>
<body>
    <div class="glass-container">
        <h1>Zarejestruj się</h1>

        <!-- Formularz rejestracyjny -->
        <form action="registration.php" method="POST" onsubmit="return validateForm()">
            <input type="text" name="username" id="username" placeholder="Nazwa użytkownika" required>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <input type="password" name="password" id="password" placeholder="Hasło" required>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Potwierdź hasło" required>
            <button type="submit" name="register">Zarejestruj się</button>
        </form>

        <!-- Przycisk Zaloguj się -->
        <p>Masz już konto? <a href="login.php">Zaloguj się</a></p>

        <!-- Przycisk "Zarejestruj się jako admin" -->
        <p>Chcesz zarządzać sklepem? <a href="admin_login.php" class="admin-button">Zarejestruj się jako admin</a></p>
    </div>

    <!-- Walidacja po stronie klienta (JavaScript) -->
    <script>
        function validateForm() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;

            if (password !== confirmPassword) {
                alert('Hasła muszą być takie same!');
                return false;
            }

            if (password.length < 6) {
                alert('Hasło musi mieć co najmniej 6 znaków!');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
