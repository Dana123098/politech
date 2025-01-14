<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perfume_catalog";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $conn->query("DELETE FROM users WHERE id = $delete_id");
    header("Location: manage_users.php");
}

$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarządzaj użytkownikami</title>
    <link rel="stylesheet" href="style_manage_users.css">

</head>
<body>
    <h1>Zarządzaj użytkownikami</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nazwa użytkownika</th>
            <th>Email</th>
            <th>Rola</th>
            <th>Akcje</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['role']; ?></td>
                <td>
                    <a href="manage_users.php?delete_id=<?php echo $row['id']; ?>">Usuń</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
