<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Sign Up</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="css/accountcss.css" />
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
        <span class="home-icon">&#8962;</span> Home </a>
 
<?php
session_start();

  include("connection.php");
  include("function.php");


  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    //something was posted
   
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
 

   // echo $user_name;


    if(!empty($email) && !empty($password) && !is_numeric($email))
    {
        

     
        
        //   $password=md5($password);//

            //save to database
            $user_id = random_num(20);
            $query = "insert into users(user_id,firstname,lastname,email,password) values ('$user_id','$firstname','$lastname','$email','$password')";

            mysqli_query($conn,$query);

            echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully your Sign Up!!!');
    window.location.href='Login.php';
    </script>");

        }
    
    else{
    
         echo "Please enter some valid information!";

      }
  }
?>
<div class="wrapper">
    <div class="registration_form">
        <div class="title">
            <h1><b><u>TLE User Sign-up</u></b></h1>
        </div>

        <form action="#" method="POST">
            <div class="form_wrap">
                <div class="input_grp">
                    <div class="input_wrap">
                        <label for="fname"><b>First Name:</b></label>
                        <input type="text" id="fname" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="input_wrap">
                        <label for="lname"><b>Last Name:</b></label>
                        <input type="text" id="lname" name="lname" placeholder="Last Name" required>
                    </div>
   
                <div class="input_wrap">
                    <label for="email"><b>Email Address:</b></label>
                    <input type="text" id="email" name="email" placeholder="E-mail" required>
                </div>
                <div class="input_wrap">
                    <label for="password"><b>Password:</b></label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
             </div>
                <div class="input_wrap">
                    <button class="submit_btn" name="submit">Register Now</button>
                    <a href="login.php" class="login">Click Here to Login</a><br>
           
                </div>
        </form>
    </div>
</div>
</body>
</html>
