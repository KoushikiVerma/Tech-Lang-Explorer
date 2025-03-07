<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: admindashboard.php");
    exit();
}

include("../connection.php");

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    // Fetch the student data from the database
    $query = "SELECT * FROM users WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query);
    $student = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    // Get updated student data from the form
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    // Update the student data in the database
    $update_query = "UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email' WHERE user_id = $user_id";
    if (mysqli_query($conn, $update_query)) {
        header("Location: students.php"); // Redirect to the students list after updating
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <link rel="stylesheet" href="../admin/add.css" />
</head>
<body>
    <div class="form-container">
        <h1>Edit Student</h1>
        <form method="POST" action="">
            <label for="firstname">First Name:</label><br>
            <input type="text" id="firstname" name="firstname" value="<?php echo $student['firstname']; ?>" required><br><br>

            <label for="lastname">Last Name:</label><br>
            <input type="text" id="lastname" name="lastname" value="<?php echo $student['lastname']; ?>" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="<?php echo $student['email']; ?>" required><br><br>

            <button type="submit" name="update" style="background-color: #4CAF50;color: white;">Update</button>
        </form>
    </div>
</body>
</html>
