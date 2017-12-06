<!DOCTYPE html>
<html>
   <head>
     <meta http-equiv='content-type' content='text/html;charset=utf-8' />
     <title>Login</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   </head>
<body>
<center><img src="logo.png" alt="Logo de PERLOAN"></center>
  <div class="container">
    <h3 class="text-center">Acceso al sistema de Deudores</h3>
    <?php
    $a=23;
      if(isset($_POST['submit'])){
        $username = $_POST['username']; $password = $_POST['password'];
        if($username === 'admin' && $password === 'password'){
          $_SESSION['login'] = true; header('LOCATION:read.php'); die();
        } {
          echo "<div class='alert alert-danger'>Usuario o contraseña erroneos.</div>";
        }
	}
      
    ?>
    <form action="" method="post">
      <div class="form-group">
        <label for="username">Usuario:</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="pwd">contraseña:</label>
        <input type="password" class="form-control" id="pwd" name="password" required>
      </div>
      <button type="submit" name="submit" class="btn btn-default">Acceder</button>
    </form>
  </div>
</body>
</html>