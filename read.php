<!doctype html>
<head>
    <title>Lista de Deudores</title>
    <?php include "templates/resources.php" ?>
	<?php require_once "scripts/db_funcs.php" ?>
</head>
<body>
<center><img src="logo.png" alt="Logo de PERLOAN"></center>
<hr>
<h1>Lista de Deudores</h1>
<h2>Refinar busqueda</h2>
<table>
<tbody>
<tr>
<td><form action="readname.php?<?php echo $_GET[fname]?>" method="GET">
<div class="controls-row">Nombre: <input type="text" name="fname"><br>
</div>
<center><input type="submit" class="btn btn-primary" value="Buscar por nombre"></center></td>
</form>
<td><form action="readlastname.php?<?php echo $_GET[fapellido]?>" method="GET">
<div class="controls-row">Apellido: <input type="text" name="fapellido"><br>
</div>
<center><input type="submit" class="btn btn-primary" value="Buscar por apellido"></center></td>
</form>
<td><form action="readcolonia.php?<?php echo $_GET[fcolonia]?>" method="GET">
<div class="controls-row">Colonia: <input type="text" name="fcolonia"><br>
</div>
<center><input type="submit" class="btn btn-primary" value="Buscar por colonia"></center></td>
</form>
<td><form action="readciudad.php?<?php echo $_GET[fciudad]?>" method="GET">
<div class="controls-row">Ciudad: <input type="text" name="fciudad"><br>
</div>
<center><input type="submit" class="btn btn-primary" value="Buscar por ciudad"></center></td>
</form>
</tr>
</tbody>
</table>
<hr>
<!--?php include 'templates/table_select.php' ?-->
<?php 
if(!isset($_GET["table_select"])) {
	$table_select="deudores";
	echo "<h2>Lista de $table_select:</h2>";
	$conn = db_connect();
	$query_string="select id as 'ID',nombre as 'Nombre',ap1 as 'Apellido Paterno',ap2 as 'Apellido Materno',calle as 'Calle',nodom as 'Numero',colonia as 'Colonia',ciudad as 'Ciudad',codpostal as 'Codigo Postal',estado as 'Estado',tel as 'Telefono' from $table_select";	
	$res = odbc_exec ($conn, $query_string); 
	$number_of_rows = odbc_num_rows($res);
	if($number_of_rows >= 1){
		echo"<div class='table-responsive'>";
		odbc_result_all($res, "class='table table-striped table-bordered'") ; 
		odbc_close ($conn);
		echo"</div>";
	}
	else{
		echo "<h4>Sin registros para la consulta.<h4>"; 
		odbc_close ($conn);
	}
}
else {
	$table_select = $_GET["table_select"];
	echo "<h2>Lista de $table_select:</h2>";
	$conn = db_connect();
	$query_string="select * from $table_select";	
	$res = odbc_exec ($conn, $query_string); 
	$number_of_rows = odbc_num_rows($res);
	if($number_of_rows >= 1){
		echo"<div class='table-responsive'>";
		odbc_result_all($res, "class='table table-striped table-bordered'") ; 
		odbc_close ($conn);
		echo"</div>";
	}
	else{
		echo "<h4>Sin registros para la consulta.<h4>"; 
		odbc_close ($conn);
	}
}
?>
<script type="text/javascript">
	$(function() {
		updateNavBar('read.php');
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
<form action="/index.php" method="POST">
  <input type="submit" class="btn btn-primary" value="Salir del Sistema">
</form>
</td>
<td>
<button class="btn btn-primary" onclick="myFunction()">Imprimir</button>
</td>
</table>
<table>
<td>
<form action="/read.php" method="get">
  <input type="submit" class="btn btn-primary" value="Actualizar">
</form>
</td>
</table>
</body>
</html>