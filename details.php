<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

// Get the selected subject from the URL
$subject = isset($_GET['subject']) ? $_GET['subject'] : 'Unknown Subject';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resources for <?php echo htmlspecialchars($subject); ?></title>
<style>
.logout-btn {
            position: fixed;
            top: 10px;
            right: 10px;
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #e60000;
        }

</style>
</head>
<body>
 <form action="logout.php" method="post">
        <button class="logout-btn" type="submit">Logout</button>
    </form>
<h2 style="text-align: center;">**Explore Ways to Learn <?php echo htmlspecialchars($subject); ?>**</h2>

<div style="display: flex; justify-content: center; gap: 40px; margin-top: 150px;">
    <a href="books.php?subject=<?php echo urlencode($subject); ?>">
        <img src="assets/book.jpg" alt="Books" style="width: 300px; height: 300px; border-radius: 15%;">
    </a>
    <a href="videos.php?subject=<?php echo urlencode($subject); ?>">
        <img src="assets/video.jpg" alt="Videos" style="width: 300px; height: 300px; border-radius: 15%;">
    </a>
</div>

</body>
</html>
