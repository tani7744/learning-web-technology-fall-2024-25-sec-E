<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM doctors WHERE doctor_id = :id"; // Update table as needed
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $id]);

    header('location: userlist.php');
}
?>
