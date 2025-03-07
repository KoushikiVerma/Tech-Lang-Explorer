<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: adminlogin.php");
    exit();
}

include("../connection.php");

// Assuming you have a feedback table with columns 'id', 'user_id', 'message', 'date'
$query = "SELECT * FROM feedback";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback</title>
    <link rel="stylesheet" href="../css/accountcss.css" />
<link rel="stylesheet" href="../admin/dash.css">

</head>
<body>
    <div class="main-content">
        <h1>Feedback</h1>
        <table>
            <tr>
				<th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
				<td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['message']; ?></td>
                <td><?php echo $row['submitted_at']; ?></td>
				<td>
				 <a href="editfeedback.php?id=<?php echo $row['id']; ?>" class="edit-btn"> <button class="edit-btn">Edit</button>
                </a>
                 <a href="deletefeedback.php?id=<?php echo $row['id']; ?>" class="remove-btn" onclick="return confirm('Are you sure you want to delete this record?');"><button class="remove-btn" type="submit" name="remove">Remove</a>
                </td>
       
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
