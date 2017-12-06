<header>
    <div class="navbar">
  		<div class="navbar-inner">
    	<ul class="nav">
    	  <li data-ref="read.php"><a href="read.php">Consultar</a></li>
    	</ul>
  	</div>
</div>


<?php 
	if(isset($_GET['success'])) {
		echo "<div class='alert alert-success'><a class='close' data-dismiss='alert' href='#'>&times;</a>{$_GET['success']}</div>";
		unset($_GET['success']);
	}
?>
</header>