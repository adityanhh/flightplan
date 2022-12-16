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
        echo"<script>alert('Account Updated!');window.location='readpembeli.php';</script>";
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <link rel="stylesheet" href="stylesheet/admin.css">
    <link rel="icon" href="media/logofp.png">
</head>
<body>
<?php include 'headeradmin.php'?>
<div class="card-addnew">
	<h2>Edit Account "<?=$contact['username']?>"</h2>
    <form action="updatepembeli.php?id=<?=$contact['id']?>" method="post">
        <label for="id">ID</label>
        <input type="text" name="id" value="<?=$contact['id']?>" id="id">
        <label for="nama">Full Name</label>
        <input type="text" name="nama" value="<?=$contact['nama']?>" id="nama">
        <label for="email">Email</label>
        <input type="text" name="email" value="<?=$contact['email']?>" id="email">
        <label for="username">Username</label>
        <input type="text" name="username" value="<?=$contact['username']?>" id="username">
        <label for="password">Password</label>
        <input type="password" name="password" value="<?=$contact['password']?>" id="title">
        <label for="role">Role</label>
        <input type="text" name="role" value="<?=$contact['role']?>" id="title">
        <div class="submit-button">
            <input type="submit" value="Update">
        </div>
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
</body>
</html>


