<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: adminlogin.php");
    exit();
}

include("../connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Fetch the existing feedback data
    $query = "SELECT * FROM feedback WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $feedback = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {	
    // Get the updated data from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Update the feedback in the database
    $update_query = "UPDATE feedback SET name='$name', email='$email', message='$message' WHERE id = $id";
    if (mysqli_query($conn, $update_query)) {
        header("Location: admin/feedback.php"); // Redirect to the feedback page after update
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Feedback</title>
    <link rel="stylesheet" href="../admin/add.css" />
</head>
<body>
    <div class="form-container">
        <h1>Edit Feedback</h1>
        <form method="POST" action="">
            <label for="name" >Name:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $feedback['name']; ?>" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="<?php echo $feedback['email']; ?>" required><br><br>

            <label for="message">Message:</label><br>
            <textarea id="message" name="message" required><?php echo $feedback['message']; ?></textarea><br><br>

        <button type="submit" style="background-color: #4CAF50;color: white;">Update</button>
        </form>
    </div>
</body>
</html>
