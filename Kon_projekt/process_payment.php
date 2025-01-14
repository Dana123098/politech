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

// --- Sprawdzenie, czy użytkownik jest zalogowany ---
if (!isset($_SESSION['user_id'])) {
    header("Location: registration.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// --- Sprawdzenie, czy formularz został przesłany ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pobranie danych z formularza
    $payment_method = isset($_POST['blik_code']) ? 'BLIK' : 'Karta płatnicza';

    // --- Pobranie produktów z koszyka ---
    $sql = "SELECT * FROM cart WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $order_details = '';
    $total_price = 0;

    while ($row = $result->fetch_assoc()) {
        $order_details .= $row['product_name'] . ' - ' . number_format($row['product_price'], 2) . " zł\n";
        $total_price += $row['product_price'];
    }

    // --- Usunięcie produktów z koszyka po złożeniu zamówienia ---
    $delete_sql = "DELETE FROM cart WHERE user_id = ?";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bind_param("i", $user_id);
    $delete_stmt->execute();

    // --- Przekierowanie do katalogu z komunikatem o sukcesie ---
    header("Location: catalog.php?order_success=1");
    exit();
}
?>
