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
    $judul = isset($_POST['judul']) ? $_POST['judul'] : '';
    $tujuan = isset($_POST['tujuan']) ? $_POST['tujuan'] : '';
    $harga = isset($_POST['harga']) ? $_POST['harga'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO produk VALUES (?, ?, ?, ?)');
    $stmt->execute([$id, $judul, $tujuan, $harga]);
    // Output message
    $msg = 'Created Successfully!';
    echo"<script>alert('Package Created Successfully');window.location='readrute.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Package</title>
    <link rel="stylesheet" href="stylesheet/admin.css">
    <link rel="icon" href="media/logofp.png">
</head>
<body>
    <?php include 'headeradmin.php'?>
<div class="card-addnew">
	<h2>Create Travel Package</h2>
    <form action="createrute.php" method="post">
        <label for="id">ID Package</label>
        <br>
        <input type="text" name="id" value="auto" id="id">
        <br>
        <label for="kode_rute">Title</label>
        <br>
        <input type="text" name="judul" id="judul">
        <br>
        <label for="rute">Destination</label>
        <br>
        <input type="text" name="tujuan" id="tujuan">
        <br>
        <label for="pekerjaan">Price</label>
        <br>
        <input type="text" name="harga" id="harga">
        <br>
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

