<?php
require_once 'Database.php';

class User {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function register($username, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashedPassword);
        return $stmt->execute();
    }

    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }
}
