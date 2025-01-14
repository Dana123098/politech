<?php
// --- Rozpoczęcie sesji ---
session_start();

// --- Wylogowanie użytkownika ---
if (isset($_GET['logout'])) {
    session_destroy(); // Zniszczenie sesji
    header("Location: registration.php"); // Przekierowanie na stronę rejestracji
    exit();
}

// --- Połączenie z bazą danych ---
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perfume_catalog";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// --- Obsługa dodawania do koszyka ---
if (isset($_POST['add_to_cart'])) {
    $product = $_POST['product_name'];
    $price = $_POST['product_price'];
    $user_id = $_SESSION['user_id']; // Zakładamy, że użytkownik jest zalogowany i jego ID jest zapisane w sesji

    // Zapisanie produktu do koszyka w bazie danych
    $stmt = $conn->prepare("INSERT INTO cart (user_id, product_name, product_price) VALUES (?, ?, ?)");
    $stmt->bind_param("isd", $user_id, $product, $price);
    $stmt->execute();
    $stmt->close();

    // Przekierowanie z komunikatem po dodaniu produktu
    header("Location: catalog.php?success=1");
    exit();
}

// --- Pobranie danych o produktach z bazy danych ---
$search = isset($_GET['search']) ? $_GET['search'] : '';
$min_price = isset($_GET['min_price']) ? $_GET['min_price'] : 0;
$max_price = isset($_GET['max_price']) ? $_GET['max_price'] : 10000;
$brand = isset($_GET['brand']) ? $_GET['brand'] : 'all';

// Tworzenie zapytania SQL z filtrami
$sql = "SELECT * FROM perfumes WHERE price BETWEEN ? AND ?";
$params = [$min_price, $max_price];
$param_types = "dd";

// Jeśli wybrano filtr brand, dodajemy dodatkowy warunek
if ($brand !== 'all') {
    $sql .= " AND name LIKE ?";
    $params[] = "%$brand%";
    $param_types .= "s";
}

// Jeśli wpisano tekst do wyszukiwania, dodajemy dodatkowy warunek
if (!empty($search)) {
    $sql .= " AND (name LIKE ? OR description LIKE ?)";
    $searchParam = "%$search%";
    $params[] = $searchParam;
    $params[] = $searchParam;
    $param_types .= "ss";
}

$stmt = $conn->prepare($sql);
$stmt->bind_param($param_types, ...$params);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfume Catalog</title>
    <link rel="stylesheet" href="style_catalog.css">
</head>
<body>
    <!-- Pasek nawigacyjny -->
    <div class="navigation-panel">
        <a href="catalog.php" class="logo">Mystique Perfumes</a>

        <!-- Ikona hamburgera -->
        <div class="hamburger-menu" onclick="toggleMenu()">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>

        <!-- Linki nawigacyjne -->
        <nav id="nav-links" class="hidden">
            <a href="catalog.php">Home</a>
            <form method="GET" action="catalog.php" class="filter-box">
                <label for="min_price">Cena od:</label>
                <input type="number" name="min_price" id="min_price" value="<?php echo $min_price; ?>" min="0">
                <label for="max_price">Cena do:</label>
                <input type="number" name="max_price" id="max_price" value="<?php echo $max_price; ?>" min="0">
                <label for="brand">Brand:</label>
                <select name="brand" id="brand">
                    <option value="all" <?php echo $brand === 'all' ? 'selected' : ''; ?>>Wszystkie</option>
                    <option value="Chanel" <?php echo $brand === 'Chanel' ? 'selected' : ''; ?>>Chanel</option>
                    <option value="Tom Ford" <?php echo $brand === 'Tom Ford' ? 'selected' : ''; ?>>Tom Ford</option>
                    <option value="Gucci" <?php echo $brand === 'Gucci' ? 'selected' : ''; ?>>Gucci</option>
                    <option value="Louis Vuitton" <?php echo $brand === 'Louis Vuitton' ? 'selected' : ''; ?>>Louis Vuitton</option>
                    <option value="Armani" <?php echo $brand === 'Armani' ? 'selected' : ''; ?>>Armani</option>
                </select>
                <button type="submit">Filtruj</button>
            </form>
            <a href="catalog.php?logout=1">Log out</a>
        </nav>
    </div>

    <!-- Skrypt JavaScript -->
    <script>
        function toggleMenu() {
            const navLinks = document.getElementById('nav-links');
            navLinks.classList.toggle('hidden');
        }
    </script>

    <h1>Perfume Catalog</h1>

    <!-- Pasek wyszukiwania -->
    <div class="search-box">
        <form method="GET" action="catalog.php">
            <input type="text" name="search" placeholder="Wyszukaj perfumy..." value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit">Szukaj</button>
        </form>
    </div>

    <!-- Komunikat po dodaniu produktu do koszyka -->
    <?php if (isset($_GET['success'])): ?>
        <div id="cart-buttons">
            <button id="continue-shopping" onclick="window.location.href='catalog.php'">Kontynuuj zakupy</button>
            <button id="go-to-cart" onclick="window.location.href='cart.php'">Przejdź do kosza</button>
        </div>
    <?php endif; ?>

    <!-- Wyświetlanie produktów -->
    <div class="products-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='product-card'>";
                echo "<form method='POST' action='catalog.php'>";
                echo "<div class='product-image'>";
                echo "<img src='" . htmlspecialchars($row['image_path']) . "' alt='" . htmlspecialchars($row['name']) . "' style='width:100%; height:auto;'>";
                echo "</div>";
                echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
                echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                echo "<p><strong>Cena: " . number_format($row['price'], 2) . " zł</strong></p>";
                echo "<input type='hidden' name='product_name' value='" . htmlspecialchars($row['name']) . "'>";
                echo "<input type='hidden' name='product_price' value='" . htmlspecialchars($row['price']) . "'>";
                echo "<button type='submit' name='add_to_cart'>Dodaj do kosza</button>";
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "<p>Brak dostępnych produktów.</p>";
        }
        ?>
    </div>
</body>
</html>
