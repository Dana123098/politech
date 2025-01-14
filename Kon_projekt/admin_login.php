<?php
session_start();

// --- Połączenie z bazą danych ---
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perfume_catalog";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// --- Sprawdzenie danych logowania ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Pobranie użytkownika z bazy danych
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND role = 'admin'");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Sprawdzenie, czy użytkownik istnieje i hasło jest poprawne
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['admin_id'] = $user['id'];
        $_SESSION['admin_username'] = $user['username'];
        header("Location: admin_panel.php"); // Przekierowanie do panelu admina
        exit();
    } else {
        echo "<p style='color:red;'>Błędny email lub hasło.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="style_admin_log.css">
</head>
<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        <form method="POST" action="admin_login.php">
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Hasło:</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Log In</button>
        </form>
        <p><a href="registration.php">Powrót do strony głównej</a></p>
    </div>
</body>
</html>
