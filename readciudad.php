<!doctype html>
<head>
    <title>Busqueda por Ciudad</title>
    <?php include "templates/resources.php" ?>
	<?php require_once "scripts/db_funcs.php" ?>
</head>
<body>
<img src="logo.png" class="rounded mx-auto d-block" alt="Logo de PERLOAN">
<h1>Lista de deudores por Ciudad</h1>
<hr>
<h2>Buscar usando Ciudad</h2>
<table>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
<div class="controls-row">Ciudad: <input type="text" name="fciudad"><br>
</div>
<input type="submit" class="btn btn-primary" value="Buscar por ciudad">
</form>
</table>
<hr>
<?php
if(isset($_GET['bciudad'])){

}
else{
	$buscar=$_GET["fciudad"];
	
		$conn2 = db_connect();
		$query_string2="select id as 'ID',nombre as 'Nombre',ap1 as 'Apellido Paterno',ap2 as 'Apellido Materno',calle as 'Calle',nodom as 'Numero',colonia as 'Colonia',ciudad as 'Ciudad',codpostal as 'Codigo Postal',estado as 'Estado',tel as 'Telefono' from deudores where ciudad like '$buscar'";	
		$res2 = odbc_exec ($conn2, $query_string2);
		$number_of_rows = odbc_num_rows($res2);
		echo "<div class='table-responsive'>";
		if($number_of_rows >= 1){
			odbc_result_all($res2, "class='table table-striped'");
			odbc_close ($conn2);
		}
		else{
			echo "<h4>Sin registros para la consulta.<h4>"; 
			odbc_close ($conn2);
		}
		echo "</div>";
}
?>
<script type="text/javascript">
	$(function() {
		updateNavBar('readciudad.php');
	});
</script>
<script>
function myFunction() {
    window.print();
}
</script>
<hr>
<table>
<td>
<form action="/read.php" method="get">
  <input type="submit" class="btn btn-primary" name="home" value="Regresar">
</form>
</td>
<td>
<button class="btn btn-primary" onclick="myFunction()">Imprimir</button>
</td>
</table>
</body>
</html>