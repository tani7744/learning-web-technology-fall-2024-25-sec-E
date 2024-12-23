<?php
session_start();

// Check if the user is logged in
if (!isset($_COOKIE['status'])) {
    header('Location: login.html');
    exit();
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the data from the form
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $email = trim($_POST['email'] ?? '');

    // Validate the inputs
    if (empty($username) || empty($password) || empty($email)) {
        echo "All fields are required.";
        exit();
    }

    // Update the user in the session or database
    if (isset($_SESSION['users'])) {
        foreach ($_SESSION['users'] as &$user) {
            if ($user['id'] == $_REQUEST['id']) {
                $user['username'] = $username;
                $user['password'] = $password; // Ideally, hash the password before saving
                $user['email'] = $email;
                break;
            }
        }
    }

    // Redirect back to the user list
    header('Location: userlist.php');
    exit();
} else {
    header('Location: edit.php');
    exit();
}
