<?php
include("../connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the existing record
    $query = "SELECT * FROM subjects WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $image_path = $_POST['image_path'];

    // Update the record
    $query = "UPDATE subjects SET name = '$name', image_path = '$image_path' WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Record updated successfully.'); window.location.href = 'admindashboard.php';</script>";
    } else {
        echo "<script>alert('Error updating record: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Subject</title>
       <link rel="stylesheet" href="../admin/add.css" />

</head>
<body>
    <div class="form-container">
    <h1>Edit Subject</h1>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required><br><br>
        
        <label for="image_path">Image Path:</label>
        <input type="text" id="image_path" name="image_path" value="<?php echo $row['image_path']; ?>"><br><br>
        
        <button type="submit" style="background-color: #4CAF50;color: white;">Update</button>
    </form>
</body>
</html>
