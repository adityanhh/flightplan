<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $role = isset($_POST['role']) ? $_POST['role'] : '';
        
        // Update the record
        $stmt = $pdo->prepare('UPDATE pembeli SET id = ?, nama = ?, email = ?, username = ?, password = ?, role = ? WHERE id = ?');
        $stmt->execute([$id, $nama, $email, $username, $password, $role, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM pembeli WHERE id = ?');
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
    <form action="updatepembeli.php?id=<?=$contact['id']?>" method="post">
        <label for="id">ID</label>
        <label for="nama">Nama</label>
        <input type="text" name="id" value="<?=$contact['id']?>" id="id">
        <input type="text" name="nama" value="<?=$contact['nama']?>" id="nama">
        <label for="email">Email</label>
        <label for="username">No. Telp</label>
        <input type="text" name="email" value="<?=$contact['email']?>" id="email">
        <input type="text" name="username" value="<?=$contact['username']?>" id="username">
        <label for="password">password</label>
        <input type="text" name="password" value="<?=$contact['password']?>" id="title">
        <label for="role">role</label>
        <input type="text" name="role" value="<?=$contact['role']?>" id="title">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>