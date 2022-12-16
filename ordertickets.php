
<?php include "config.php"?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Plan | Your Plan for Travel Flight</title>
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
        if(!empty($_SESSION["cart"])){
            ?>
            <h2>My <span>Plans.</span></h2>
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>Package</th>
                    <th>Destination</th>
                    <th>Price</th>
                    <th>Seats</th>
                    <th>SubTotal</th>
                    <th>Edit</th>
                </tr>
                <?php
                $no=1;
                $grandtotal = 0;
                foreach($_SESSION["cart"] as $cart => $val){
                    $subtotal = $val["harga"] * $val["jumlah"];
                    ?>
                    <tr>
                    <td><?php echo $no++?>.</td>
                    <td><?php echo $val["judul"];?></td>
                    <td><?php echo $val["tujuan"];?></td>
                    <td><?php echo $val["harga"];?></td>
                    <td><?php echo $val["jumlah"];?>kursi</td>
                    <td><?php echo $subtotal;?></td>
                    <td>
                        <a href="deleteticket.php?id=<?php echo $cart?>" onclick="return confirm('Are you sure want to delete plan?');">
                            <div class="delete-button">
                                Delete
                            </div>
                        </a>
                    </td>
                    </tr>
                    <?php
                    $grandtotal+=$subtotal;
                }
            ?>
            <div class="total-price">
            <tr>
                <th colspan="5">Total Price</th>
                <th><?php echo $grandtotal?></th>
                <th>&nbsp;</th>
            </tr>
            </div>
            </table>
            <a href="addtransaction.php">
                <div class="checkout-button">
                    Checkout
                </div>
            </a>
            <a href="travelinfo.php">
                <div class="addnew-button">
                    + Add New Plan
                </div>
            </a>

            <?php
        }else{
            echo <<<EOT
            <div class="content">
                <img src="media/tiketpesawat.png">
                <h2>Oops!!</h2>
                <p>You don't have any plan yet</p>
                <p>Press <a href="travelinfo.php">here</a> to add plan</p>
            </div>
            EOT;
        }
    ?>
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