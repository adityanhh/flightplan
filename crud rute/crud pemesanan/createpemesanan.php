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
    $kode_rute = isset($_POST['kode_rute']) ? $_POST['kode_rute'] : '';
    $kode_pesawat = isset($_POST['kode_pesawat']) ? $_POST['kode_pesawat'] : '';
    $tanggal_keberangkatan = isset($_POST['tanggal_keberangkatan']) ? $_POST['tanggal_keberangkatan'] : '';
    $waktu_keberangkatan = isset($_POST['waktu_keberangkatan']) ? $_POST['waktu_keberangkatan'] : '';
    $waktu_sampai = isset($_POST['waktu_sampai']) ? $_POST['waktu_sampai'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO pemesanan VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $kode_rute, $kode_pesawat, $tanggal_keberangkatan, $waktu_keberangkatan, $waktu_sampai]);
    // Output message
    $msg = 'Created Successfully!';
}
?>



<div class="content update">
	<h2>Create tanggal_keberangkatan</h2>
    <form action="createpemesanan.php" method="post">
        <label for="id">ID</label>
        <label for="kode_rute">kode_rute</label>
        <input type="text" name="id" value="auto" id="id">
        <input type="text" name="kode_rute" id="kode_rute">
        <label for="kode_pesawat">tanggal_keberangkatan</label>
        <label for="notelp">kode_pesawat</label>
        <input type="text" name="tanggal_keberangkatan" id="tanggal_keberangkatan">
        <input type="text" name="kode_pesawat" id="kode_pesawat">
        <label for="pekerjaan">waktu_keberangkatan</label>
        <input type="text" name="waktu_keberangkatan" id="waktu_keberangkatan">
        <label for="pekerjaan">waktu_sampai</label>
        <input type="text" name="waktu_sampai" id="waktu_sampai">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
