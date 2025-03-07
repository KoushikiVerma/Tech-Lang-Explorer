<?php
include("connection.php");

// Initialize variables
$name = $email = $message = $success = $error = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate form fields
    if (empty($name) || empty($email) || empty($message)) {
        $error = "All fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format!";
    } else {
        // Insert data into database
        $query = "INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            $success = "Feedback submitted successfully!";
            $name = $email = $message = ""; // Clear form fields
        } else {
            $error = "Failed to submit feedback. Please try again.";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    
<style>
       
        body {
            font-family: Arial, sans-serif;
            background-color: #2C2F48;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .feedback-form {
            background: white;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .feedback-form h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #4CAF50;
        }
        .feedback-form input,
        .feedback-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .feedback-form button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .feedback-form button:hover {
            background-color: #45a049;
        }
        .feedback-form .message {
            margin: 10px 0;
            padding: 10px;
            border-radius: 4px;
            font-size: 14px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
       .home-btn {
            position: fixed;
            top: 10px;
            right: 10px;
            background-color: #f0f0f0;
            color: #333; 
            border: 1px solid #ccc;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .home-btn:hover {
            background-color: #e0e0e0; 
        }

        .home-icon {
            font-size: 18px; 
        }
    </style>
</head>
<body>
    <a href="index.php" class="home-btn">
        <span class="home-icon">&#8962;</span> Home </a>
    <form action="feedback.php" method="POST" class="feedback-form">
        <h2>Submit Feedback</h2>

        <?php if ($success): ?>
            <div class="message success"><?php echo $success; ?></div>
        <?php elseif ($error): ?>
            <div class="message error"><?php echo $error; ?></div>
        <?php endif; ?>

        <input type="text" name="name" placeholder="Your Name" value="<?php echo $name; ?>" required>
        <input type="email" name="email" placeholder="Your Email" value="<?php echo $email; ?>" required>
        <textarea name="message" placeholder="Your Message" rows="5" required><?php echo $message; ?></textarea>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
