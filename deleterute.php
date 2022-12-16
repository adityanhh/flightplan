<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check that the contact ID exists
if (isset($_GET['id'])) {
    // Select the record that is going to be deleted
    $stmt = $pdo->prepare('SELECT * FROM produk WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Package doesnt exist!');
    }
    // Make sure the user confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // User clicked the "Yes" button, delete record
            $stmt = $pdo->prepare('DELETE FROM produk WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'You have deleted package!';
            echo"<script>alert('Package Deleted');window.location='readrute.php';</script>";
        } else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: readrute.php');
            exit;
        }
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
    <title>Delete Package</title>
    <link rel="stylesheet" href="stylesheet/admin.css">
    <link rel="icon" href="media/logofp.png">
</head>
<body>
<div class="content-delete">
	<h2>Delete Package "<?=$contact['judul']?>" ?</h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete Package "<?=$contact['judul']?>" ?</p>
    <div class="yesno">
        <a href="deleterute.php?id=<?=$contact['id']?>&confirm=yes">
            <div class="button-yes">
                Yes
            </div>
        </a>
        <a href="deleterute.php?id=<?=$contact['id']?>&confirm=no">
            <div class="button-no">
                No
            </div>
        </a>
    </div>
    <?php endif; ?>
</div>
</body>
</html>
