<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: admindashboard.php");
    exit();
}

include("../connection.php");

if (isset($_POST['add'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure password hashing

    // Insert the new student into the database
    $query = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$password')";
    if (mysqli_query($conn, $query)) {
        header("Location: students.php"); // Redirect to students list after adding
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Student</title>
       <link rel="stylesheet" href="../admin/add.css">
</head>
<body>
    <div class="form-container">
        <h1>Add New Student</h1>
        <form method="POST" action="">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" required>

            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="add">Add Student</button>
        </form>
    </div>
</body>
</html>
