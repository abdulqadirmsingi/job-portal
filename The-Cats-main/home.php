<?php
include("includes/config.php");
include("includes/database.php");

// Check if there is a search query
$searchQuery = '';
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];
}

// Modify the SQL query based on the search query
if ($searchQuery) {
    $stm = $conn->prepare('SELECT * FROM job WHERE title LIKE ?');
    $searchParam = "%" . $searchQuery . "%";
    $stm->bind_param('s', $searchParam);
} else {
    $stm = $conn->prepare('SELECT * FROM job');
}

$stm->execute();
$result = $stm->get_result();
?>



<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kampala</title>
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
                <li><a href="home.php" id="active"><h4>Home</h4></a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.html">Register</a></li>
                <li><a href="adminlogin.php">Admin</a></li>
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

    <div class="mainContent">
        <div class="searchBar" id="searchQuery">
    <form>
        <input type="text" name="query" id="searchQuery" class="searchInput" placeholder="Search jobs..." value="<?php echo htmlspecialchars($searchQuery); ?>">
        <input type="submit" value="Search" class="searchButton">
    </form>
</div>

        <div class="leftMainTitle">
            <h1>Available Jobs</h1>
        </div>
        
        <div class="cardGroups">
            <?php

            while ($record = mysqli_fetch_assoc($result)) {

                $id = $record['id'];

            ?>
                <div class="cardOne">
                    <div class="cardColor">
                        <div class="cardDateBookmark">
                            <div class="date">
                                <span><?php echo $record['date']; ?> </span>
                            </div>
                        </div>
                        <div class="companyPositionLogo">
                            <div class="companyPosition">
                                <h3><?php echo $record['title']; ?> </h3>
                            </div>
                        </div>
                        <div class="roleCardGroup">
                            <div class="eachRoleCard"><?php echo $record['type']; ?> </div>
                            <div class="eachRoleCard"><?php echo $record['schedule']; ?> </div>
                        </div>
                    </div>
                    <div class="cardBottom">
                        <div class="PriceLocation">
                            <h3><?php echo $record['salary']; ?></h3>
                        </div>
                        <div class="detailsBtn"><a href="details.php?id=<?php echo $id; ?>">Details</a></div>
                    </div>
                </div>


            <?php
            }
            ?>

        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Useful links</h4>
                    <ul>
                        <li><a href="home.php">Home</a></li>

                        <li>
                            <a href="login.php">Login</a>
                        </li>
                        <li><a href="register.html">Register</a></li>
                        <li><a href="adminLogin.php">Admin</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Location</h4>
                    <div class="logo">
                        <ul>
                            <li>
                                <p>Kampala Road No. 2</p>
                            </li>
                            <li>
                                <p>Road, Gongo la Mboto</p>
                            </li>
                            <li>
                                <p>P. O. Box 9790, Ilala 12110</p>
                                
                            </li>
                            <li>
                                <p>Dar es Salaam</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Contact Us</h4>
                    <div class="social-links">
                        <a href="+255 716 153 399" target="_blank"><i class="fa-solid fa-phone"></i></a>
                        <a href="mailto:info@kiut.ac.tz" target="_blank"><i class="fas fa-envelope"></i></a>
                        <a href="https://www.instagram.com/kiutanzania/" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="script.js"></script>
    <script>
    document.getElementById('searchQuery').addEventListener('input', function() {
        const query = this.value;

        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'home.php?query=' + encodeURIComponent(query), true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('results').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    });
    </script>
</body>

</html>