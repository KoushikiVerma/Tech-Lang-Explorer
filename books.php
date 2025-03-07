<?php
session_start();
include("connection.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

// Get the selected subject from the URL, ensure it's safe
$subject = isset($_GET['subject']) ? htmlspecialchars($_GET['subject']) : 'Unknown Subject';

// Fetch books for the selected subject
$query = "SELECT id, title, cover_img, file_path FROM books WHERE subject = ?";
$stmt = $conn->prepare($query);

if ($stmt === false) {
    die("Error preparing the query: " . $conn->error);
}

$stmt->bind_param("s", $subject);
$stmt->execute();
$result = $stmt->get_result();

// Check if any books are returned
if ($result->num_rows === 0) {
    $no_books_message = "No books available for this subject.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books for <?php echo htmlspecialchars($subject); ?></title>
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
        .book-container {
            text-align: center;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 50px;
        }
        .book-item {
            width: 200px;
            text-align: center;
        }
        .cover-image {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .book-title {
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
<h2 style="text-align: center;">Books for <?php echo htmlspecialchars($subject); ?></h2>

<div class="book-container">
    <?php if (isset($no_books_message)): ?>
        <p><?php echo $no_books_message; ?></p>
    <?php else: ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="book-item">
                <a href="<?php echo htmlspecialchars($row['file_path']); ?>" target="_blank">
                    <img src="<?php echo htmlspecialchars($row['cover_img']); ?>" alt="Cover of <?php echo htmlspecialchars($row['title']); ?>" class="cover-image">
                </a>
                <div class="book-title"><?php echo htmlspecialchars($row['title']); ?></div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>

</body>
</html>

