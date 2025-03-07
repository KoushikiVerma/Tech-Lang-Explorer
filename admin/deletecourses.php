<?php
// deletecourses.php

include("../connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record
    $query = "DELETE FROM subjects WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Record deleted successfully.');</script>";
    } else {
        echo "<script>alert('Error deleting record: " . mysqli_error($conn) . "');</script>";
    }
}

header("Location: admindashboard.php"); // Redirect back to the main page (update if needed)
exit();
?>
