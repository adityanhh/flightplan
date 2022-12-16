
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | FlightPlan.</title>
    <link rel="stylesheet" href="stylesheet/contactus.css">
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
            <a href="#" class="dropbtn1">Contact Us</a>
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

    <div class="card-contact">
        <img src="media/logofp.png" alt="Flightplan">
        <h3>Contact us</h3>
        <form id="fcf-form-id" class="fcf-form-class" method="post" action="contact-form-process.php">
            <label for="Name" class="fcf-label">Your name</label>
                <div class="fcf-input-group">
                    <input type="text" id="Name" name="Name" class="fcf-form-control" required>
                </div>
            <div class="fcf-form-group">
                <label for="Email" class="fcf-label">Your email address</label>
                <div class="fcf-input-group">
                    <input type="email" id="Email" name="Email" class="fcf-form-control" required>
                </div>
            <div class="fcf-form-group">
                <label for="Message" class="fcf-label">Your message</label>
                <div class="fcf-input-group">
                    <textarea id="Message" name="Message" class="fcf-form-control" rows="6" maxlength="3000" required></textarea>
                </div>
            </div>
            <div class="fcf-form-group">
                <button type="submit" id="fcf-button" class="">Send</button>
            </div>
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