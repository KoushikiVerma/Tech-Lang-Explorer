<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: adminlogin.php");
    exit();
}

include("../connection.php");
include("../function.php");

// Fetch total students
$query_students = "SELECT COUNT(*) as total FROM users";
$result_students = mysqli_query($conn, $query_students);
$row_students = mysqli_fetch_assoc($result_students);
$total_students = $row_students['total'];
// Fetch total courses
$query_courses = "SELECT COUNT(*) as total FROM subjects ";
$result_courses = mysqli_query($conn, $query_courses);
$row_courses = mysqli_fetch_assoc($result_courses);
$total_courses = $row_courses['total'];
// Fetch total Books
$query_pdfs = "SELECT COUNT(*) as total FROM books";
$result_pdfs = mysqli_query($conn, $query_pdfs);
$row_pdfs = mysqli_fetch_assoc($result_pdfs);
$total_pdfs = $row_pdfs['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../admin/style.css">
   <link rel="stylesheet" href="../css/accountcss.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body bgcolor="blue">
   <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="../assets/admin.jpg" alt="">
            </div>
            <span class="logo_name">
            <p>Admin</p>
        </div>
               <div class="menu-items">
        <ul class="nav-links">
            <li><a href="../admin/admindashboard.php">
                    <i class="fas fa-building"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
            <li><a href="../admin/courses.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span class="link-name">Courses</span>
                </a></li>
            <li><a href="../admin/students.php">
                    <i class="fa-solid fa-graduation-cap logo1"></i>
                    <span class="link-name">Students/Users</span>
                </a></li>
            <li><a href="../admin/books.php">
                    <i class="fa-solid fa-file-pdf"></i>
                    <span class="link-name">Books</span>
                </a></li>
                <li><a href="../admin/feedbacklist.php">
                    <i class="fa-solid fa-message"></i>
                    <span class="link-name">Feedback</span>
                </a></li>      
        </ul>
            <ul class="logout-mode">
                <li><a href="../admin/logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span class="link-name">Logout</span>
                    </a></li>
            </ul>
        </div>
    </nav>
    <section class="dashboard">
        <div class="top">
            <i class="fa-solid fa-bars sidebar-toggle"></i>
            <img src="../assets/admin.jpg" alt="not available">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="fas fa-building"></i>
                    <span class="text">Dashboard</span>
                </div><br><Br>

                <div class="boxes">
          
				<div class="box box1">
                <i class="fa-solid fa-graduation-cap logo1"></i>
                            <span class="text">Total Students</span>
                            <span class="number"><?php echo $total_students;?></span>
                        </div> 
           
               <div class="box box2">
                       <i class="fa-solid fa-book-open logo2"></i>
                            <span class="text">Total courses</span>
                            <span class="number"><?php echo $total_courses;?></span>
                        </div>

               <div class="box box3">
              <i class="fa-solid fa-file-pdf"></i>
                            <span class="text">Total Pdf</span>
                            <span class="number"><?php echo $total_pdfs;?></span>
                        </div>
          </div>
            </div>

            <div class="activity">
                <div class="activity-data">
                    <!-- Activity data -->
                </div>
            </div>
        </div>
  
  </section>
    <script src="../scriptdash2.js"></script>
</body>

</html>
