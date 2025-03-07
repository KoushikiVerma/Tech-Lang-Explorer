<?php 
session_start();

include("connection.php");
include("function.php");

$user_data = check_login($conn);

// Query to get technologies from the database
$technologies_query = "SELECT * FROM subjects WHERE type='Technology'";
$technologies_result = mysqli_query($conn, $technologies_query);

// Query to get languages from the database
$languages_query = "SELECT * FROM subjects WHERE type='Language'";
$languages_result = mysqli_query($conn, $languages_query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select a Subject</title>
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

        /* Style to make the images rounded */
        .subject-image {
            height: 250px;
            width: 297px;
            border-radius: 50%;
            margin: 1px;
        }
        .container {
            text-align: center;
        }

    </style>
</head>
<body>
    <form action="logout.php" method="post">
        <button class="logout-btn" type="submit">Logout</button>
    </form>
<div class="container">
    <h1>**Explore Technologies**</h1><br>
    <?php 
    // Display Technology subjects
    while ($row = mysqli_fetch_assoc($technologies_result)) {
        echo '<a href="details.php?subject=' . urlencode($row['name']) . '">';
        echo '<img src="' . htmlspecialchars($row['image_path']) . '" class="subject-image" alt="' . htmlspecialchars($row['name']) . '">';
        echo '</a>';
    }
    ?>
    
    <h1>**Explore Languages**</h1><br>
    <?php 
    // Display Language subjects
    while ($row = mysqli_fetch_assoc($languages_result)) {
        echo '<a href="details.php?subject=' . urlencode($row['name']) . '">';
        echo '<img src="' . htmlspecialchars($row['image_path']) . '" class="subject-image" alt="' . htmlspecialchars($row['name']) . '">';
        echo '</a>';
    }
    ?>
</div>

</body>
</html>
