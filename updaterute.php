<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $judul = isset($_POST['judul']) ? $_POST['judul'] : '';
        $tujuan = isset($_POST['tujuan']) ? $_POST['tujuan'] : '';
        $harga = isset($_POST['harga']) ? $_POST['harga'] : '';
        
        // Update the record
        $stmt = $pdo->prepare('UPDATE produk SET id = ?, judul = ?, tujuan = ?, harga = ?  WHERE id = ?');
        $stmt->execute([$id, $judul, $tujuan, $harga, $_GET['id']]);
        $msg = 'Updated Successfully!';
        echo"<script>alert('Package Updated');window.location='readrute.php';</script>";
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM produk WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Package doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Travel Package</title>
    <link rel="stylesheet" href="stylesheet/admin.css">
    <link rel="icon" href="media/logofp.png">
</head>
<body>
    
</body>
</html>
<?php include 'headeradmin.php'?>

<div class="card-addnew">
	<h2>Edit Package "<?=$contact['judul']?>"</h2>
    <form action="updaterute.php?id=<?=$contact['id']?>" method="post">
        <label for="id">ID</label>
        <input type="text" name="id" value="<?=$contact['id']?>" id="id">
        <label for="judul">Title</label>
        <input type="text" name="judul" value="<?=$contact['judul']?>" id="judul">
        <label for="tujuan">Destination</label>
        <input type="text" name="tujuan" value="<?=$contact['tujuan']?>" id="tujuan">
        <label for="harga">Price</label>
        <input type="text" name="harga" value="<?=$contact['harga']?>" id="harga">
        <div class="submit-button">
            <input type="submit" value="Update">
        </div>
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>