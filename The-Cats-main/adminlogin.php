<?php

include("includes/database.php");
include("includes/config.php");


?>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome to Kampala Admin Portal</title>
  <link rel="stylesheet" href="adminlogin.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />

</head>

<body>
  <?php

    if (isset($_SESSION['email'])) {
        echo '
    <nav>
        <div class="left">
            <ul id="nav-list">
                <li>
                    <div class="pataKazi">
                        <i class="fa-solid fa-globe"></i>
                        <h1 class="companyName"><a href="home.php">Kampala</a></h1>
                    </div>
                </li>
                <li><a href="home.php" id="active"><h4>Home</h4></a></li>
                <li id="logout-item"><a href="userlogout.php">Logout</a></li>
            </ul>
        </div>
        <div class="right">
       <div class="location">
          <i class="fa-solid fa-location-dot"></i>
          <a href="">Dar Es Salaam, TZ</a>
        </div>
      
      </div>
    
    
    </nav>
    ';
    } else {
        echo '
    <nav>
        <div class="left">
            <ul id="nav-list">
                <li>
                    <div class="pataKazi">
                        <i class="fa-solid fa-globe"></i>
                        <h1 class="companyName"><a href="home.php">Kampala</a></h1>
                    </div>
                </li>
                <li><a href="home.php"><h4>Home</h4></a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.html">Register</a></li>
                <li><a href="adminlogin.php" id="active">Admin</a></li>
            </ul>
        </div>
        <div class="right">
        <div class="location">
           <i class="fa-solid fa-location-dot"></i>
           <a href="">Dar Es Salaam, TZ</a>
         </div>
        
       </div>
       </nav>
    ';
    }
    ?>
  <div class="maincontent">
    <img src="images/kkiu.png" alt="" />
    <p>Welcome to Kampala Admin Portal</p>

    <form action="adminloginhandler.php" method="post">
      <input type="text" name="uname" placeholder="Username" />
      <input type="password" name="pass" placeholder="Password" />
      <input type="submit" name="login" value="Log In" />
    </form>
    <div class="error-message">
      <?php
      if (isset($_GET['error'])) {
        echo "Username or password is incorrect.";
      }
      ?>
    </div>
  </div>
</body>

</html>