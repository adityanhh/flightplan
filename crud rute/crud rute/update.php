<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $kode_rute = isset($_POST['kode_rute']) ? $_POST['kode_rute'] : '';
        $rute = isset($_POST['rute']) ? $_POST['rute'] : '';
        $kelas = isset($_POST['kelas']) ? $_POST['kelas'] : '';
        $harga = isset($_POST['harga']) ? $_POST['harga'] : '';
        $waktu = isset($_POST['waktu']) ? $_POST['waktu'] : '';
        
        // Update the record
        $stmt = $pdo->prepare('UPDATE rute SET id = ?, kode_rute = ?, rute = ?, kelas = ?, harga = ?, waktu = ? WHERE id = ?');
        $stmt->execute([$id, $kode_rute, $rute, $kelas, $harga, $waktu, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM rute WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('User doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>



<?=template_header('Read')?>

<div class="content update">
	<h2>Update Contact #<?=$contact['id']?></h2>
    <form action="update.php?id=<?=$contact['id']?>" method="post">
        <label for="id">ID</label>
        <label for="kode_rute">kode_rute</label>
        <input type="text" name="id" value="<?=$contact['id']?>" id="id">
        <input type="text" name="kode_rute" value="<?=$contact['kode_rute']?>" id="kode_rute">
        <label for="rute">rute</label>
        <label for="kelas">No. Telp</label>
        <input type="text" name="rute" value="<?=$contact['rute']?>" id="rute">
        <input type="text" name="kelas" value="<?=$contact['kelas']?>" id="kelas">
        <label for="harga">harga</label>
        <input type="text" name="harga" value="<?=$contact['harga']?>" id="title">
        <label for="waktu">waktu</label>
        <input type="text" name="waktu" value="<?=$contact['waktu']?>" id="title">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>