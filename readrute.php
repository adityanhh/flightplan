<?php
include 'functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 5;


// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM produk ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Get the total number of contacts, this is so we can determine whether there should be a next and previous button
$num_contacts = $pdo->query('SELECT COUNT(*) FROM produk')->fetchColumn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Package</title>
    <link rel="stylesheet" href="stylesheet/admin.css">
    <link rel="icon" href="media/logofp.png">
</head>
<body>
<?php include 'headeradmin.php'?>
<div class="container-table">
	<h2>Travel Package</h2>
	<table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Destination</th>
                <th>Price</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?=$contact['id']?></td>
                <td><?=$contact['judul']?></td>
                <td><?=$contact['tujuan']?></td>
                <td><?=$contact['harga']?></td>
                <td class="actions">
                    <a href="updaterute.php?id=<?=$contact['id']?>" class="edit">
                        <div class="add-button">
                            Edit
                        </div>
                    </a>
                    <a href="deleterute.php?id=<?=$contact['id']?>" class="trash">
                        <div class="delete-button">
                            Delete
                        </div>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="createrute.php" class="create-contact">
        <div class="plus-button">
            + Add Package
        </div>
    </a>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="readrute.php?page=<?=$page-1?>"></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_contacts): ?>
		<a href="readrute.php?page=<?=$page+1?>"></a>
		<?php endif; ?>
	</div>
</div>

</body>
</html>