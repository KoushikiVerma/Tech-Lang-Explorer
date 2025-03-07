<?php
session_start();
include("connection.php");

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get the selected subject from the URL
$subject = isset($_GET['subject']) ? $_GET['subject'] : 'Unknown Subject';

// Query to fetch videos for the selected subject
$videos_query = "SELECT title, video_url, thumbnail_img FROM videos WHERE subject = ?";
$videos_stmt = $conn->prepare($videos_query);
$videos_stmt->bind_param("s", $subject);
$videos_stmt->execute();
$videos_result = $videos_stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos for <?php echo htmlspecialchars($subject); ?></title>
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
        .video-container {
            text-align: center;
            display: flex;
            flex-wrap: wrap;
            gap: 100px;
            justify-content: center;
            margin-top: 100px;
        }
        .video-item {
            width: 500px;
            text-align: center;
        }
        .video-thumbnail {
            width: 100%;
            height: auto;
            cursor: pointer;
        }
        .video-title {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<form action="logout.php" method="post">
        <button class="logout-btn" type="submit">Logout</button>
    </form>
<h2 style="text-align: center;">Video Tutorials for <?php echo htmlspecialchars($subject); ?></h2>

<div class="video-container">
    <?php while ($video = $videos_result->fetch_assoc()): ?>
        <div class="video-item">
            <a href="<?php echo htmlspecialchars($video['video_url']); ?>" target="_blank">
                <img src="<?php echo htmlspecialchars($video['thumbnail_img']); ?>" alt="Thumbnail of <?php echo htmlspecialchars($video['title']); ?>" class="video-thumbnail">
            </a>
            <div class="video-title"><?php echo htmlspecialchars($video['title']); ?></div>
        </div>
    <?php endwhile; ?>
    <div class="no-videos-message">
        <p>Videos will be available soon.</p>
    </div>
</div>

</body>
</html>
