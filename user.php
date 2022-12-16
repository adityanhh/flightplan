<?php 
    session_start();
    if(!isset($_SESSION["login"])) {
	header("Location:landingpage.php");
	exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Plan | Your Plan for Travel Flight</title>
    <link rel="stylesheet" href="stylesheet/index.css">
    <link rel="icon" href="media/logofp.png">
</head>
<body>
    <header>
        <div class="header-left">
            <a href="user.php">
                <b><a href="user.php">Flight <span>Plan<span>.</a></b>
            </a>
        </div>
        <div class="header-right">
            <a href="contactususer.php" class="dropbtn1">Contact Us</a>
            <p>|</p>
            <a href="aboutususer.php">About Us</a>
            <p>|</p>
            <a href="landingpage.php" onclick="return confirm('Are you sure want to logout?');">Logout</a>
        </div>
    </header>
    <div class="sec-left">
            <a href="user.php">
                <img src="media/logofp.png" alt="">
            </a>
    </div>
    <div class="sec-header">
        <a href="user.php">Home</a>
        <a href="ordertickets.php">My Plan</a>
        <a href="travelinfo.php">Travel Package</a>
    </div>
    <div class="th-header">
    </div>
        <div class="malasngoding-slider">
                <div class="isi-slider">
                    <img src="media/slide3.png" alt="gambar1">
                    <img src="media/slide2.png" alt="gambar2">
                    <img src="media/slide1.png" alt="gambar3">
                </div>
        </div>
        <br>
    <div class="card-holder">
        <h1>Your Future Plan in Our <span>Travel Flight</span></h1>
        <div class="card">
            <div class="image-holder">
                <img src="media/img1.png" alt="">
            </div>
            <h2>Yogyakarta</h2>
            <p>One of the best places in Indonesia that you can visit with us, experiencing a well vacation till the end.</p>
        </div>
        <div class="card">
            <div class="image-holder">
                <img src="media/img2.png" alt="">
            </div>
            <h2>Bandung</h2>
            <p>Most Popular city in the countries just looked like the New york of Indonesia, made your vacation feels like America.</p>
        </div>
        <div class="card">
            <div class="image-holder">
                <img src="media/img3.png" alt="">
            </div>
            <h2>Bali</h2>
            <p>Who don't know Bali, the most recent places visited by every single person in the world, come on dont be left behind!</p>
        </div>
        <div class="card">
            <div class="image-holder">
                <img src="media/img4.png" alt="">
            </div>
            <h2>Lombok</h2>
            <p>Nicest view, best beach that Indonesia ever had lets come and see whats on the beautiful of Indonesia really is.</p>
        </div>
    </div>
    <div class="last-content">
        <img src="media/airport-terminal.png" alt="">
    </div>
    <footer>
        <div class="footer">
            <div class="menu-left">
                <b><p>VACATION INFORMATION</p></b>
                <a href="travelinfo.php">Order a Package</a>
                <br>
                <br>
                <a href="ordertickets.php">My Plan</a>
            </div>
            <div class="menu-right">
                <b><p>GET HELP</p></b>
                <a href="aboutususer.php">About Us</a>
                <br>
                <br>
                <a href="contactususer.php">Contact Us</a>
            </div>
            <div class="contact">
            <a href="#">
                <img src="media/instalogo.png" alt="">
            </a>
            <a href="#">
                <img src="media/twitterlogo.png" alt="">
            </a>
            <a href="#">
                <img src="media/gmaillogo.png" alt="">
            </a>
        </div>
        </div>
        <div class="copyright">
            <p>Flight Plan 2023 &#169; Allright Reserved</p>
        </div>
        
    </footer>
</body>
</html>