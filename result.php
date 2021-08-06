<?php
include 'functions.php';

$pdo = pdo_connect_mysql();

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$search = $_GET['search'];

$records_per_page = 5;

$stmt = $pdo->prepare('SELECT * FROM contacts WHERE name LIKE $search$ ORDER BY id ASC :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();

$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$num_contacts = $pdo->query('SELECT COUNT(*) FROM contacts')->fetchColumn();

?>
<?=template_header('Contact List')?>

<div class="content read">
   <!--  <h2>Result</h2></h2>

    <form action="result.php" method="GET">
        <input type="text" name="search" id="search">
        <button type="submit" id="search">Search</button>
    </form> -->
    
    <a href="create.php" class="create-contact">Add Student</a>
    
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Title</td>
                <td>Created</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?=$contact['id']?></td>
                <td><?=$contact['name']?></td>
                <td><?=$contact['email']?></td>
                <td><?=$contact['phone']?></td>
                <td><?=$contact['title']?></td>
                <td><?=$contact['created']?></td>
                <td class="actions">
                    <a href="update.php?id=<?=$contact['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=<?=$contact['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_contacts): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>