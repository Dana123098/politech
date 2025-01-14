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

// --- Usuwanie produktu z koszyka ---
if (isset($_POST['remove_item'])) {
    $cart_id = $_POST['cart_id'];
    $stmt = $conn->prepare("DELETE FROM cart WHERE id = ?");
    $stmt->bind_param("i", $cart_id);
    $stmt->execute();
    header("Location: cart.php");
    exit();
}

// --- Pobranie produktów z koszyka ---
$sql = "SELECT * FROM cart WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koszyk</title>
    <link rel="stylesheet" href="style_cart.css">
</head>
<body>
    <div class="container">
        <h2>Koszyk</h2>

        <h3>Wybrane produkty:</h3>
        <ul>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li>";
                echo "<strong>" . htmlspecialchars($row['product_name']) . "</strong> - " . number_format($row['product_price'], 2) . " zł";
                echo "<form method='POST' action='cart.php' class='remove-form'>";
                echo "<input type='hidden' name='cart_id' value='" . $row['id'] . "'>";
                echo "<button type='submit' name='remove_item' class='remove-button'>Usuń</button>";
                echo "</form>";
                echo "</li>";
            }
        } else {
            echo "<p>Koszyk jest pusty.</p>";
        }
        ?>
        </ul>

        <h3>Opcje płatności:</h3>
        <form method="POST" action="checkout.php">
            <h3>Adres odbiorcy:</h3>
            <div class="form-group">
                <label for="phone">Numer telefonu:</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="country">Kraj:</label>
                <input type="text" id="country" name="country" required>
            </div>
            <div class="form-group">
                <label for="city">Miasto:</label>
                <input type="text" id="city" name="city" required>
            </div>
            <div class="form-group">
                <label for="street">Ulica:</label>
                <input type="text" id="street" name="street" required>
            </div>
            <div class="form-group">
                <label for="house">Numer domu i mieszkania:</label>
                <input type="text" id="house" name="house" required>
            </div>

            <h3>Opcje dostawy:</h3>
            <div class="form-group">
                <label for="delivery">Wybierz sposób dostawy:</label>
                <select id="delivery" name="delivery_cost" onchange="updateDeliveryCost()" required>
                    <option value="12.00">Kurier - 12.00 zł</option>
                    <option value="10.00">Poczta Polska - 10.00 zł</option>
                    <option value="0.00">Odbiór osobisty - 0.00 zł</option>
                </select>
            </div>

            <h3>Koszt dostawy: <span id="delivery-cost">0.00 zł</span></h3>

            <div class="form-group">
                <button type="submit">Kup teraz</button>
            </div>
        </form>
    </div>

    <script>
        function updateDeliveryCost() {
            const deliverySelect = document.getElementById('delivery');
            const deliveryCost = deliverySelect.value;
            document.getElementById('delivery-cost').textContent = parseFloat(deliveryCost).toFixed(2) + " zł";
        }
    </script>
</body>
</html>
