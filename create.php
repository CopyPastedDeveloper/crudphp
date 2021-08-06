<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (!empty($_POST)) {
    
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;

    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $fbname = isset($_POST['fbname']) ? $_POST['fbname'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
    
    $stmt = $pdo->prepare('INSERT INTO contacts VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $name, $email, $phone, $title, $created]);
  
    $msg = 'Created Successfully!';
}
?>

<?=template_header('Add Student')?>

<div class="content update">
	<h2>Add Student</h2>
    <form action="create.php" method="post">
        <!-- <label for="id">ID</label> -->
        <label for="name">Name</label>
        <label for="email">Email</label>
        <!-- <input type="text" name="id"  value="auto" id="id"> -->
        <input type="text" name="name"  id="name">
        <input type="text" name="email"  id="email">
      <!--   <label for="email">Email</label> -->
        <label for="phone">Phone</label>
        <label for="title">Title</label>
        <!-- <input type="text" name="email"  id="email"> -->
        <input type="text" name="phone"  id="phone">
        <input type="text" name="title"  id="title">
        <!-- <label for="title">Title</label> -->
        <!-- <label for="created">Created</label>
        <input type="text" name="title"  id="title">
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i')?>" id="created"> -->
        <input type="submit" value="Submit">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>