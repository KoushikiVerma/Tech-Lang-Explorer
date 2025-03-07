<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: adminlogin.php");
    exit();
}

include("../connection.php");

$query = "SELECT * FROM subjects ";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Courses</title>
   <link rel="stylesheet" href="../css/accountcss.css" />
 <link rel="stylesheet" href="../admin/dash.css">

</head>
<body>
    <div class="main-content">
   <h1>Courses <a href="addcourse.php" class="add-btn"></i>Add New Course</a></h1>
                <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['type']; ?></td>
            <td><img src="<?php echo $row['image_path']; ?>" alt="Course Image" width="50" height="50"></td>
            <td>
                <a href="editcourses.php?id=<?php echo $row['id']; ?>" class="edit-btn"> <button class="edit-btn">Edit</button>
                </a>
                <a href="deletecourses.php?id=<?php echo $row['id']; ?>" class="remove-btn" onclick="return confirm('Are you sure you want to delete this record?');"><button class="remove-btn" type="submit" name="remove">Remove</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>