<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: admindashboard.php");
    exit();
}

include("../connection.php");

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students</title>
    <link rel="stylesheet" href="../css/accountcss.css">
    <link rel="stylesheet" href="../admin/dash.css">

</head>
<body>
    <div class="main-content">
        <h1>Students<a href="addstudent.php" class="add-btn"></i>Add New Student</a></h1>
        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    <!-- Edit Button -->
                    <a href="editstudent.php?user_id=<?php echo $row['user_id']; ?>">
                        <button class="edit-btn">Edit</button>
                    </a>
                    <!-- Remove Button -->
                    <form action="removestudent.php" method="POST" style="display:inline;">
                        <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                        <button class="remove-btn" type="submit" name="remove">Remove</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
