<?php
session_start();

// --- Obsługa wylogowania ---
if (isset($_GET['logout'])) {
    session_destroy(); // Zniszczenie sesji
    header("Location: registration.php"); // Przekierowanie na stronę rejestracji
    exit();
}

// --- Sprawdzenie, czy admin jest zalogowany ---
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style_admin_panel.css">
</head>
<body>
    <h1>Admin Panel</h1>
    <nav>
        <a href="manage_users.php">Zarządzaj użytkownikami</a> |
        <a href="manage_products.php">Zarządzaj produktami</a> |
       
        <!-- Dodajemy link z parametrem "logout" -->
        <a href="admin_panel.php?logout=1">Wyloguj się</a>
    </nav>
</body>
</html>
