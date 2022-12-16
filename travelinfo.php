<?php
    include "config.php";

?>

<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package | Your Plan for Travel Flight</title>
    <link rel="stylesheet" href="stylesheet/ordertickets.css">
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
	<div class="container-table">
        <?php
        $sql = "SELECT * FROM `produk`";
        $query = mysqli_query($conn,$sql);
        ?>
		<h2>Flight <span>Plan.</span> Best Offer For You</h2>
        <table cellpadding="10" border="1">
            <tr>
                <th>No.</th>
                <th>Package</th>
                <th>Destination</th>
                <th>Price</th>
                <th>&nbsp;</th>
            </tr>
            <?php
            $no=1;
            while($hasil = mysqli_fetch_object($query)){
                ?>
                <tr>
                    <td><?php echo $no++?>.</td>
                    <td><?php echo $hasil ->judul?></td>
                    <td><?php echo $hasil ->tujuan?></td>
                    <td><?php echo $hasil ->harga?></td>
                    <td>
                        <a href="addticket.php?id=<?php echo $hasil->id ?>">
							<div class="add-cart-btn">
								+ Add to Cart
							</div>
						</a>
                    </td>
                </tr>
                <?php
            }
        ?>
        </table>
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