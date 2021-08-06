<?php
include 'functions.php';

?>

<?=template_header('Home')?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="content">
	<h2>Home</h2> 
	<marquee><p style="text-shadow:2px 2px green;">Welcome to Student Management System</p></marquee>
	
</div>
<div class="container">
  <div class="card-deck">
    <div class="card bg-primary">
      <div class="card-body text-center">

        <p class="card-text">
        <?php  
          $contact['name']
        
        ?> </p>
      </div>
    </div>
    <div class="card bg-warning">
      <div class="card-body text-center">
        <p class="card-text">Some text inside the second card</p>
      </div>
    </div>
    <div class="card bg-success">
      <div class="card-body text-center">
        <p class="card-text">Some text inside the third card</p>
      </div>
    </div>
    <div class="card bg-danger">
      <div class="card-body text-center">
        <p class="card-text">Some text inside the fourth card</p>
      </div>
    </div>  
  </div>
</div>

<?=template_footer()?>