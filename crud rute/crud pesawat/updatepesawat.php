<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $nama_pesawat = isset($_POST['nama_pesawat']) ? $_POST['nama_pesawat'] : '';
        $kode_pesawat = isset($_POST['kode_pesawat']) ? $_POST['kode_pesawat'] : '';
        $nomor_kursi = isset($_POST['nomor_kursi']) ? $_POST['nomor_kursi'] : '';
        
        // Update the record
        $stmt = $pdo->prepare('UPDATE pesawat SET id = ?, nama_pesawat = ?, kode_pesawat = ?, nomor_kursi = ? WHERE id = ?');
        $stmt->execute([$id, $nama_pesawat, $kode_pesawat, $nomor_kursi, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM pesawat WHERE id = ?');
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
    <form action="updatepesawat.php?id=<?=$contact['id']?>" method="post">
        <label for="id">ID</label>
        <label for="nama_pesawat">nama_pesawat</label>
        <input type="text" name="id" value="<?=$contact['id']?>" id="id">
        <input type="text" name="nama_pesawat" value="<?=$contact['nama_pesawat']?>" id="nama_pesawat">
        <label for="kode_pesawat">kode_pesawat</label>
        <label for="nomor_kursi">nomor kursi</label>
        <input type="text" name="kode_pesawat" value="<?=$contact['kode_pesawat']?>" id="kode_pesawat">
        <input type="text" name="nomor_kursi" value="<?=$contact['nomor_kursi']?>" id="nomor_kursi">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
