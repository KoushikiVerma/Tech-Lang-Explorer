<?php
session_start();
include("../connection.php");

// Check if the form is submitted
if (isset($_POST['remove'])) {
    $book_id = $_POST['book_id'];

    // Delete the book from the database
    $query_delete = "DELETE FROM books WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query_delete);
    mysqli_stmt_bind_param($stmt, "i", $book_id);
    mysqli_stmt_execute($stmt);

    // Redirect back to the books page after removal
    header("Location: books.php");
    exit();
}
?>
