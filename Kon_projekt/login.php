<?php
session_start();

// --- DATABASE CONNECTION ---
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perfume_catalog";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// --- Obsługa logowania ---
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($user_id, $username, $hashed_password);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            // Ustawienie sesji dla zalogowanego użytkownika
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            header("Location: catalog.php");
            exit();
        } else {
            echo "<script>alert('Nieprawidłowe hasło!');</script>";
        }
    } else {
        echo "<script>alert('Nie znaleziono użytkownika z podanym adresem email!');</script>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="style_registration.css">
</head>
<body>
    <div class="glass-container">
        <h1>Zaloguj się</h1>

        <!-- Formularz logowania -->
        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Hasło" required>
            <button type="submit" name="login">Zaloguj się</button>
        </form>

        <!-- Przycisk Zarejestruj się -->
        <p>Nie masz konta? <a href="registration.php">Zarejestruj się</a></p>
    </div>
</body>
</html>
