<?php
session_start();

// --- Sprawdzenie, czy admin jest zalogowany ---
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
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

// --- Obsługa dodawania nowego produktu ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_path = $_POST['image_path'];

    $stmt = $conn->prepare("INSERT INTO perfumes (name, description, price, image_path) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $name, $description, $price, $image_path);
    $stmt->execute();
    $stmt->close();

    header("Location: manage_products.php");
    exit();
}

// --- Obsługa usuwania produktu ---
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $stmt = $conn->prepare("DELETE FROM perfumes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    header("Location: manage_products.php");
    exit();
}

// --- Pobranie wszystkich produktów z bazy danych ---
$result = $conn->query("SELECT * FROM perfumes");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarządzanie produktami</title>
    <link rel="stylesheet" href="style_admin.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 20px;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f7f7f7;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        input, textarea {
            padding: 10px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .delete-button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        .delete-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Zarządzanie produktami</h1>

        <!-- Form do dodawania nowego produktu -->
        <h2>Dodaj nowy produkt</h2>
        <form method="POST" action="manage_products.php">
            <input type="text" name="name" placeholder="Nazwa produktu" required>
            <textarea name="description" placeholder="Opis produktu" required></textarea>
            <input type="number" step="0.01" name="price" placeholder="Cena (w zł)" required>
            <input type="text" name="image_path" placeholder="Ścieżka do obrazu" required>
            <button type="submit" name="add_product">Dodaj produkt</button>
        </form>

        <!-- Lista produktów -->
        <h2>Lista produktów</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nazwa</th>
                    <th>Opis</th>
                    <th>Cena</th>
                    <th>Obraz</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['description']); ?></td>
                        <td><?php echo number_format($row['price'], 2); ?> zł</td>
                        <td><img src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="Obraz" style="width: 50px; height: 50px;"></td>
                        <td>
                            <a href="manage_products.php?delete=<?php echo $row['id']; ?>" class="delete-button" onclick="return confirm('Czy na pewno chcesz usunąć ten produkt?');">Usuń</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Przycisk powrotu do panelu admina -->
        <button onclick="window.location.href='admin_panel.php';">Powrót do panelu admina</button>
    </div>
</body>
</html>
