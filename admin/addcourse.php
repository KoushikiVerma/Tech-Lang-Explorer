<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: adminlogin.php");
    exit();
}

include("../connection.php");

if (isset($_POST['add'])) {
    // Get the course details from the form
    $name = $_POST['name'];
    $type = $_POST['type'];
    $image_path = $_POST['image_path'];

    // Insert the new course into the database
    $query = "INSERT INTO subjects (name, type, image_path) VALUES ('$name', '$type', '$image_path')";
    if (mysqli_query($conn, $query)) {
        header("Location: courses.php"); // Redirect to courses list after adding
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Course</title>
     <link rel="stylesheet" href="../admin/add.css">

</head>
<body>
    <div class="form-container">
        <h1>Add New Course</h1>
        <form method="POST" action="">
            <label for="name">Course Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="type">Course Type:</label>
            <select name="type" id="type" required>
                <option value="Technology">Technology</option>
                <option value="Language">Language</option>
            </select>

            <label for="image_path">Course Image URL:</label>
            <input type="text" id="image_path" name="image_path" required>

            <button type="submit" name="add">Add Course</button>
        </form>
    </div>
</body>
</html>
