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
$delivery_cost = isset($_POST['delivery_cost']) ? (float)$_POST['delivery_cost'] : 0.00;

// --- Pobranie produktów z koszyka ---
$sql_cart = "SELECT * FROM cart WHERE user_id = ?";
$stmt_cart = $conn->prepare($sql_cart);
$stmt_cart->bind_param("i", $user_id);
$stmt_cart->execute();
$result_cart = $stmt_cart->get_result();

$totalPrice = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Płatność</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f3f3f3;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
        }
        h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        .form-group button:hover {
            background-color: #218838;
        }
        .blik-form, .card-form {
            display: none;
            margin-top: 20px;
        }
    </style>
    <script>
        function togglePaymentForm() {
            const paymentMethod = document.getElementById('payment-method').value;
            document.querySelector('.blik-form').style.display = paymentMethod === 'blik' ? 'block' : 'none';
            document.querySelector('.card-form').style.display = paymentMethod === 'card' ? 'block' : 'none';
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Podsumowanie zamówienia</h2>

        <h3>Wybrane produkty:</h3>
        <ul>
        <?php
        if ($result_cart->num_rows > 0) {
            while ($row = $result_cart->fetch_assoc()) {
                echo "<li><strong>" . htmlspecialchars($row['product_name']) . "</strong> - " . number_format($row['product_price'], 2) . " zł</li>";
                $totalPrice += $row['product_price'];
            }
        } else {
            echo "<p>Koszyk jest pusty.</p>";
        }
        ?>
        </ul>

        <h3>Podsumowanie kosztów:</h3>
        <p><strong>Łączna wartość produktów: <?php echo number_format($totalPrice, 2); ?> zł</strong></p>
        <p><strong>Koszt dostawy: <?php echo number_format($delivery_cost, 2); ?> zł</strong></p>
        <p><strong>Łączny koszt zamówienia: <?php echo number_format($totalPrice + $delivery_cost, 2); ?> zł</strong></p>

        <h3>Wybierz metodę płatności:</h3>
        <div class="form-group">
            <label for="payment-method">Metoda płatności:</label>
            <select id="payment-method" onchange="togglePaymentForm()">
                <option value="">Wybierz...</option>
                <option value="blik">BLIK</option>
                <option value="card">Karta płatnicza</option>
            </select>
        </div>

        <!-- Formularz BLIK -->
        <form method="POST" action="process_payment.php" class="blik-form">
            <input type="hidden" name="total_cost" value="<?php echo number_format($totalPrice + $delivery_cost, 2); ?>">
            <div class="form-group">
                <label for="blik-code">Kod BLIK:</label>
                <input type="text" id="blik-code" name="blik_code" placeholder="Wpisz 6-cyfrowy kod BLIK" required>
            </div>
            <div class="form-group">
                <button type="submit">Zapłać</button>
            </div>
        </form>

        <!-- Formularz Karty Płatniczej -->
        <form method="POST" action="process_payment.php" class="card-form">
            <input type="hidden" name="total_cost" value="<?php echo number_format($totalPrice + $delivery_cost, 2); ?>">
            <div class="form-group">
                <label for="card-number">Numer karty:</label>
                <input type="text" id="card-number" name="card_number" placeholder="Wpisz numer karty" required>
            </div>
            <div class="form-group">
                <label for="card-expiry">Data ważności (MM/RR):</label>
                <input type="text" id="card-expiry" name="card_expiry" placeholder="MM/RR" required>
            </div>
            <div class="form-group">
                <label for="card-cvv">CVV:</label>
                <input type="text" id="card-cvv" name="card_cvv" placeholder="3-cyfrowy kod" required>
            </div>
            <div class="form-group">
                <button type="submit">Zapłać</button>
            </div>
        </form>
    </div>
</body>
</html>
