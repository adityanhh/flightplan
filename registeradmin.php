<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register an Account</title>
    <link rel="stylesheet" href="stylesheet/admin.css">
    <link rel="icon" href="media/logofp.png">
</head>
<body>
    <?php include 'headeradmin.php'?>
<div class="card-signup">
    <img src="media/logofp.png" alt="Flightplan">
        <div class="line">
            <h2>REGISTER AN ACCOUNT</h2>
            <p></p>
        </div>
        <div class="garis">
        </div>
        <form action="" method="post" role="form">
            <input type="text" name="email" required="" placeholder="email">
            <br>
            <input type="text" name="nama" required="" placeholder="Full Name">
            <br>
            <input type="text" name="username" class="formulir" required="" placeholder="Username">
            <br>
            <input type="password" name="password" class="formulir" required="" placeholder="Password">
            <br>
            <div class="custom-select">
                <select name="role" required="">
                    <option value="" disabled selected hidden>Select Role:</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="chck" name="chck" value="checkbox">
            </div>
            <div class="checkbox-content" required="">
                <label for="chck">By checking the checkbox, you agreed to make this account</label>
                <script>
                    function myFunction() {
                    var x = document.getElementById("chck").required;
                    document.getElementById("demo").innerHTML = x;
                    }
                </script>
            </div>
            <br>
            <button type="submit" class="button-submit" name="submit" value="Get selected value">Sign Up</button>
        </form>
    </div>
        <?php
            include('koneksi.php');

            if(isset($_POST['submit'])) {
                $email = $_POST['email'];
                $nama = $_POST['nama'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $role = $_POST['role'];

                mysqli_query($koneksi, "insert into pembeli (email, nama, username, password, role) VALUES('$email', '$nama', '$username', '$password','$role')") or die(mysqli_error($koneksi));

                echo "<script>alert('Account Registered!');window.location='admin.php';</script>";
            }
        ?>
</body>
</html>