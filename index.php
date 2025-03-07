<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="../admin/add.css" />

    <script src="https://unpkg.com/scrollreveal"></script>
    <title>Tech Lang Explorer Home</title>
</head>
  <body>
    <header id="home">
      <nav>
        <div class="nav__bar">
          <div class="nav__logo">
		  <h1><b>Tech Lang Explorer</b></h1></div>
          <ul class="nav__links">
            <li class="link"><a href="#home">Home</a></li>
            <li class="link"><a href="#about">About Us</a></li>
            <li class="link"><a href="#contact">Contact Us</a></li>
            <li class="link"><a href="signup.php">Sign Up</a></li>
			<li class="link"><a href="login.php">User Login</a></li>
			<li class="link"><a href="admin/adminlogin.php">Admin Login</a></li>
         </ul>
        </div>
      </nav>
      <div class="section__container header__container">
        <h1>The new way to increace your knowledge of various Computer Technologies and Languages</h1>
        <h4>Discover your future with us</h4> 
		<button class="btn"><a href="login.php"><font color="black">
          Sign In </font></a><i class="ri-arrow-right-line"></i>
        </button>
      </div>
    </header>

    <section class="about" id="about">
      <div class="section__container about__container">
        <div class="about__content">
          <h2 class="section__header">About us</h2>
          <p class="section__subheader">
          Our mission is to empower individuals worldwide to reach their full potential through personalized learning pathways, expert instruction, and cutting-edge technology. Whether you're looking to expand your skills, pursue a new hobby, or advance your career, we have a diverse range of courses and resources tailored to meet your needs.
          </p>
        </div>
        <div class="about__image">
          <img src="assets/about.png" alt="about" style="border-radius:30%" />
        </div>
      </div>
    </section>

       <section class="discover" id="discover">
      <div class="section__container discover__container">
        <h2 class="section__header">Discover the Different Modules</h2><br><br>
        <div class="discover__grid" style="display: flex; justify-content: space-around; gap: 20px;">
          <!-- Technologies Card -->
          <div class="discover__card__content" style=": flex; gap: 30px;">
            <h4>Technologies</h4>
            <p>Here, Technology refers to Computer technologies involve the development and use of hardware, software, and systems for computing, data processing, and communication. Key areas include programming, networking, AI, cybersecurity, and data management. </p>
            <button class="discover__btn">Discover More</button>
          </div>
          <!-- Languages Card -->
          <div class="discover__card__content">
            <h4>Languages</h4>
            <p>Here, Language refers to Computer languages are formal languages used to give instructions to a computer, enabling the creation of software and applications. Examples include Python, Java, C++, and JavaScript, each designed for specific tasks and types of programming.</p>
            <button class="discover__btn">Discover More</button>
          </div>
        </div>
      </div>
    </section>
  
    <section class="contact" id="contact">
      <div class="section__container contact__container">
        <div class="contact__col">
          <h4>Contact us</h4>
          <p>We always aim to reply within 24 hours.</p>
        </div>
        <div class="contact__col">
          <div class="contact__card">
            <span><i class="ri-phone-line"></i></span>
            <h4>Call us</h4>
            <h5>+91 9999911111</h5>
            <p>We are online now</p>
          </div>
        </div>
        <div class="contact__col">
          <div class="contact__card">
            <h4><a href="feedback.php"  style="color: white; text-decoration: none;">Feedback</a></h4>
          </div>
        </div>
      </div>
    </section>

    <section class="footer">
      <div class="section__container footer__container">
        <h4>Tech Lang Explorer</h4>
        <div class="footer__socials">
          <span>
            <a href="#"><i class="ri-facebook-fill"></i></a>
          </span>
          <span>
            <a href="#"><i class="ri-instagram-fill"></i></a>
          </span>
          <span>
            <a href="#"><i class="ri-twitter-fill"></i></a>
          </span>
          <span>
            <a href="#"><i class="ri-linkedin-fill"></i></a>
          </span>
        </div>
        <p>
          Technology and Language Explorer. You will get knowledge in form of Books, and Video Tutorial , which will provide you easy way to learn about latest computer languages and technologies .
        </p>
        <ul class="footer__nav">
          <li class="footer__link"><a href="#home">Home</a></li>
          <li class="footer__link"><a href="#about">About</a></li>
            <li class="footer__link"><a href="#contact">Contact Us</a></li>
            <li class="footer__link"><a href="signup.php">Sign Up</a></li>
			<li class="footer__link"><a href="login.php">Login</a></li>
        </ul>
      </div>
      <div class="footer__bar">
        Copyright © 2024 Web Design. All rights reserved.
      </div>
    </section>
    <script src="main.js"></script>
  </body>
</html>
