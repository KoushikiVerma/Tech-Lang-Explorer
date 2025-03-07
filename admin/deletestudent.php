<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: admindashboard.php");
    exit();
}

include("../connection.php");

if (isset($_POST['remove'])) {
    $user_id = $_POST['user_id'];

    // Delete the student record from the database
    $delete_query = "DELETE FROM users WHERE user_id = $user_id";
    if (mysqli_query($conn, $delete_query)) {
        header("Location: students.php"); // Redirect back to the students list after deletion
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
