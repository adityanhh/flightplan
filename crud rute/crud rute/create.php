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
    $rute = isset($_POST['rute']) ? $_POST['rute'] : '';
    $kelas = isset($_POST['kelas']) ? $_POST['kelas'] : '';
    $harga = isset($_POST['harga']) ? $_POST['harga'] : '';
    $waktu = isset($_POST['waktu']) ? $_POST['waktu'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO rute VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $kode_rute, $rute, $kelas, $harga, $waktu]);
    // Output message
    $msg = 'Created Successfully!';
}
?>


<?=template_header('Create')?>

<div class="content update">
	<h2>Create kelas</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <label for="kode_rute">kode_rute</label>
        <input type="text" name="id" value="auto" id="id">
        <input type="text" name="kode_rute" id="kode_rute">
        <label for="rute">kelas</label>
        <label for="notelp">rute</label>
        <input type="text" name="kelas" id="kelas">
        <input type="text" name="rute" id="rute">
        <label for="pekerjaan">harga</label>
        <input type="text" name="harga" id="harga">
        <label for="pekerjaan">waktu</label>
        <input type="text" name="waktu" id="waktu">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>