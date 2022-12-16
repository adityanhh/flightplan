<?php
    session_start();
    session_destroy();
    session_start();
    include('koneksi.php');
    require 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | FlightPlan.</title>
    <link rel="stylesheet" href="stylesheet/login.css">
    <link rel="icon" href="media/logofp.png">
</head>
<body>
    <header>
        <div class="header-left">
            <a href="landingpage.php">
                <b><a href="landingpage.php">Flight <span>Plan<span>.</a></b>
            </a>
        </div>
        <div class="header-right">
            <a href="contactus.php" class="dropbtn1">Contact Us</a>
            <p>|</p>
            <a href="register.php">Register</a>
            <p>|</p>
            <a href="login.php">Login</a>
        </div>
    </header>
    <div class="sec-left">
            <a href="landingpage.php">
                <img src="media/logofp.png" alt="">
            </a>
    </div>
    <div class="sec-header">
        <a href="landingpage.php">Home</a>
        <a href="order.php">My Plan</a>
        <a href="travel.php">Travel Package</a>
    </div>
    <div class="card-signup">
    <img src="media/logofp.png" alt="Flightplan">
        <div class="line">
            <h2>YOUR ACCOUNT FOR EVERY FLIGHT</h2>
        </div>
        <div class="garis">
        </div>
        <form action="" method="post" role="form">
            <input type="text" name="username" class="formulir" required="" placeholder="Username">
            <br>
            <input type="password" name="password" class="formulir" required="" placeholder="Password">
            <br>
            <button type="submit" class="button-submit" name="login">Log In</button>
        </form>
    </div>
    <div class="card-login">
        <p>Not a Member?
            <a href="register.php">Sign Up</a>
        </p>
    </div>
    <footer>
        <div class="footer">
            <div class="menu-left">
                <b><p>BECOME A MEMBER</p></b>
                <a href="register.php">Sign up</a>
                <br>
                <br>
                <a href="login.php">Log in</a>
            </div>
            <div class="menu-right">
                <b><p>GET HELP</p></b>
                <a href="aboutus.php">About Us</a>
                <br>
                <br>
                <a href="contactus.php">Contact Us</a>
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