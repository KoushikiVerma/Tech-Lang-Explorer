<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: adminlogin.php");
    exit();
}

include("../connection.php");

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $subject = $_POST['subject'];
    $file_path = $_POST['file_path'];
    $cover_img = $_POST['cover_img'];

    $query = "INSERT INTO books (title, subject, file_path, cover_img) VALUES ('$title', '$subject', '$file_path', '$cover_img')";
    if (mysqli_query($conn, $query)) {
        header("Location: books.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Book</title>
    <link rel="stylesheet" href="../css/accountcss.css">
    <link rel="stylesheet" href="../admin/add.css">

</head>
<body>
    <div class="form-container">
        <h1>Add New Book</h1>
        <form method="POST" action="">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>

            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" required>

            <label for="file_path">File Path</label>
            <input type="text" id="file_path" name="file_path" required>

            <label for="cover_img">Cover Image Path</label>
            <input type="text" id="cover_img" name="cover_img" required>

            <button type="submit" name="add">Add Book</button>
        </form>
    </div>
</body>
</html>
