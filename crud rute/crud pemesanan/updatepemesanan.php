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
        $kode_pesawat = isset($_POST['kode_pesawat']) ? $_POST['kode_pesawat'] : '';
        $tanggal_keberangkatan = isset($_POST['tanggal_keberangkatan']) ? $_POST['tanggal_keberangkatan'] : '';
        $waktu_keberangkatan = isset($_POST['waktu_keberangkatan']) ? $_POST['waktu_keberangkatan'] : '';
        $waktu_sampai = isset($_POST['waktu_sampai']) ? $_POST['waktu_sampai'] : '';
        
        // Update the record
        $stmt = $pdo->prepare('UPDATE pemesanan SET id = ?, kode_rute = ?, kode_pesawat = ?, tanggal_keberangkatan = ?, waktu_keberangkatan = ?, waktu_sampai = ? WHERE id = ?');
        $stmt->execute([$id, $kode_rute, $kode_pesawat, $tanggal_keberangkatan, $waktu_keberangkatan, $waktu_sampai, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM pemesanan WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('User doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>



<div class="content update">
	<h2>Update Contact #<?=$contact['id']?></h2>
    <form action="updatepemesanan.php?id=<?=$contact['id']?>" method="post">
        <label for="id">ID</label>
        <label for="kode_rute">kode_rute</label>
        <input type="text" name="id" value="<?=$contact['id']?>" id="id">
        <input type="text" name="kode_rute" value="<?=$contact['kode_rute']?>" id="kode_rute">
        <label for="kode_pesawat">kode_pesawat</label>
        <label for="tanggal_keberangkatan">Tanggal Berangkat</label>
        <input type="text" name="kode_pesawat" value="<?=$contact['kode_pesawat']?>" id="kode_pesawat">
        <input type="text" name="tanggal_keberangkatan" value="<?=$contact['tanggal_keberangkatan']?>" id="tanggal_keberangkatan">
        <label for="waktu_keberangkatan">waktu_keberangkatan</label>
        <input type="text" name="waktu_keberangkatan" value="<?=$contact['waktu_keberangkatan']?>" id="title">
        <label for="waktu_sampai">waktu_sampai</label>
        <input type="text" name="waktu_sampai" value="<?=$contact['waktu_sampai']?>" id="title">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>