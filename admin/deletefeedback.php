<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: adminlogin.php");
    exit();
}

include("../connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the feedback from the database
    $delete_query = "DELETE FROM feedback WHERE id = $id";
    if (mysqli_query($conn, $delete_query)) {
        header("Location: admin/feedbacklist.php"); // Redirect to the feedback page after deletion
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
