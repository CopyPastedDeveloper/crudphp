<?php
function pdo_connect_mysql() {
    $host = 'localhost';
    $user = 'root';
    $pass = 'admin';
    $dbname = 'student_contact_list_db';
    try {
    	return new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $user, $pass);
    } catch (PDOException $exception) {

    	exit('Failed to connect to database!');
    }
}
function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
    <nav class="navtop">
    	<div>
    		<h1>Student Management System</h1>
            <a href="index.php"><i class="fas fa-home"></i>Home</a>
    		<a href="read.php"><i class="fas fa-address-book"></i>Student Record</a>
    	</div>
    </nav>
EOT;
}
function template_footer() {
echo <<<EOT
    </body>
</html>
EOT;
}
?>