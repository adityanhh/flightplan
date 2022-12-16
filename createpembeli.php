<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $role = isset($_POST['role']) ? $_POST['role'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO pembeli VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $nama, $email, $username, $password, $role]);
    // Output message
    $msg = 'Created Successfully!';
    echo"<script>alert('Account Activated!');window.location='readpembeli.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
    <link rel="stylesheet" href="stylesheet/admin.css">
    <link rel="icon" href="media/logofp.png">
</head>
<body>
    <?php include 'headeradmin.php'?>
    <div class="card-addnew">
	<h2>Register an Account</h2>
    <form action="createpembeli.php" method="post">
        <label for="id">ID</label>
        <input type="text" name="id" value="auto" id="id">
        <label for="nama">Full Name</label>
        <input type="text" name="nama" id="nama">
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <label for="role">Role</label>
        <input type="text" name="role" id="role">
        <div class="submit-button">
            <input type="submit" value="Create">
        </div>
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
</body>
</html>

