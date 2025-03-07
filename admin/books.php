<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: adminlogin.php");
    exit();
}

include("../connection.php");

// Fetch books from the database
$query = "SELECT * FROM books";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Books</title>
    <link rel="stylesheet" href="../css/accountcss.css">
<style>
.add-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: white;
            color: #4CAF50;
            font-size: 16px;
            text-decoration: none;
            border: 2px solid #4CAF50;
            margin-left: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Hover effect for the button */
        .add-btn:hover {
            background-color: #4CAF50;
            color: white;
        }
</style>
</head>
<body>
    <div class="main-content">
        <h1>Books <a href="addbook.php" class="add-btn"></i>Add New Book</a></h1>
        <table style="border: 5px solid white;  height:500px; width:700px;">
            <tr>
                <th style="border: 1px solid white;">ID</th>
                <th style="border: 1px solid white;">Title</th>
                <th style="border: 1px solid white;">Subject</th>
                <th style="border: 1px solid white;">Remove</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td style="border: 1px solid white;"><?php echo $row['id']; ?></td>
                <td style="border: 1px solid white;"><?php echo $row['title']; ?></td>
                <td style="border: 1px solid white;"><?php echo $row['subject']; ?></td>
                <td style="border: 1px solid white;">
                    <form action="removebooks.php" method="POST">
                        <input type="hidden" name="book_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="remove" style=" background-color: #f44336;color: white;">Remove</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
