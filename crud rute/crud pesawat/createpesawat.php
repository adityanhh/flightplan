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
    $nama_pesawat = isset($_POST['nama_pesawat']) ? $_POST['nama_pesawat'] : '';
    $kode_pesawat = isset($_POST['kode_pesawat']) ? $_POST['kode_pesawat'] : '';
    $nomor_kursi = isset($_POST['nomor_kursi']) ? $_POST['nomor_kursi'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO pesawat VALUES (?, ?, ?, ?)');
    $stmt->execute([$id, $nama_pesawat, $kode_pesawat, $nomor_kursi]);
    // Output message
    $msg = 'Created Successfully!';
}
?>



<div class="content update">
	<h2>Create nomor_kursi</h2>
    <form action="createpesawat.php" method="post">
        <label for="id">ID</label>
        <label for="nama_pesawat">nama_pesawat</label>
        <input type="text" name="id" value="auto" id="id">
        <input type="text" name="nama_pesawat" id="nama_pesawat">
        <label for="kode_pesawat">nomor_kursi</label>
        <label for="notelp">kode_pesawat</label>
        <input type="text" name="nomor_kursi" id="nomor_kursi">
        <input type="text" name="kode_pesawat" id="kode_pesawat">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
