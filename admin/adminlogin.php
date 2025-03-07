<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Admin Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="../css/accountcss.css" />
<style>
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
    <a href="../index.php" class="home-btn">
        <span class="home-icon">&#8962;</span> <!-- Unicode home icon -->
        Home
    </a>
<?php 
session_start();

include("../connection.php");
include("../function.php");

if (isset($_POST['login'])) {
    $query = "SELECT * FROM `admin` WHERE email='$_POST[email]' AND password='$_POST[password]'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['email'] = $_POST['email'];
        header("location: admindashboard.php");
    } else {
        echo '<script type="text/javascript">alert("Incorrect password!")</script>';
    }
}
?>

<div class="registration_form">
    <div class="title">
        <h1><b><u>Admin Login</u></b></h1>
    </div>

    <form action="#" method="POST">
        <div class="form_wrap">
            <div class="input_grp">
                <div class="input_wrap">
                    <label for="email"><b>Email:</b></label>
                    <input type="email" id="email" name="email" placeholder="Enter Email" required>
                </div>
                <div class="input_wrap">
                    <label for="password"><b>Password:</b></label>
                    <input type="password" id="password" name="password" placeholder="Enter Password" required>
                </div>
            </div>
            
            <button class="submit_btn" name="login">Login</button>
        </div>
    </form>
</div>
</body>
</html>
