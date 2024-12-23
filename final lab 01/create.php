<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);

    if (empty($username) || empty($password) || empty($email)) {
        echo "All fields are required.";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Add the new user to session (replace with DB in production)
        if (!isset($_SESSION['users'])) {
            $_SESSION['users'] = [];
        }

        $_SESSION['users'][] = [
            'id' => count($_SESSION['users']) + 1,
            'username' => $username,
            'password' => $hashedPassword,
            'email' => $email
        ];

        header('Location: userlist.php');
        exit();
    }
} else {
    header('Location: create.html');
    exit();
}
?>
