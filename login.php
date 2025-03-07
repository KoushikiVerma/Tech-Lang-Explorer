<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Sign-In</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
   <link rel="stylesheet" href="css/accountcss.css" />
    <script src='main.js'></script>
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
    <a href="index.php" class="home-btn">
        <span class="home-icon">&#8962;</span> <!-- Unicode home icon -->
        Home
    </a>
<?php 

session_start();

    include("connection.php");
    include("function.php");


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email) && !empty($password) && !is_numeric($email))
        {

            //read from database
            $query = "select * from users where email = '$email' limit 1";
            $result = mysqli_query($conn, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {

                    $user_data = mysqli_fetch_assoc($result);
                    
                    if($user_data['password'] === $password)
                    {

                        $_SESSION['user_id'] = $user_data['user_id'];
                        
                        header("Location:userhome.php");
                        die;
                    }
                }
            }
            
            echo "wrong email or password!";
        }else
        {
            echo "wrong email or password!";
        }
    }

?>





<div class="registration_form">
    <div class="title">
        <h1><b><u>TLE User Login</u></b></h1>
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
            <a href="signup.php" class="sign_up"><u>Sign Up</u></a><br>
            <a href="admin/adminlogin.php" class="sign_up"><u>Admin Login</u></a>
        </div>
    </form>
</div>

</body>
</html>
