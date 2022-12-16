<?php
echo <<<EOT
    <header>
        <div class="header-left">
            <a href="admin.php">
                <b><a href="admin.php">Flight <span>Plan<span>.</a></b>
            </a>
        </div>
        <div class="header-right">
            <a href="registeradmin.php">Register an account</a>
            <p>|</p>
            <a onclick="return confirm('Are you sure want to logout?');" href="landingpage.php">Logout</a>
        </div>
    </header>
    <div class="sec-left">
            <a href="admin.php">
                <img src="media/logofp.png" alt="">
            </a>
    </div>
    <div class="sec-header">
        <a href="admin.php">Home</a>
        <a href="readpembeli.php">User</a>
        <a href="readrute.php">Package</a>
    </div>
    <div class="th-header">
    </div>
EOT;
    
?>