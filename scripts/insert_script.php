<?php require_once '../scripts/db_funcs.php' ?>
<?php
	if(isset($_GET['create'])) {

		$conn = db_connect();

		$table_select = $GET['table_select'];
		$columns_row = odbc_columns($conn, $dbconf['database'], $dbconf['schema'], $table_select);
		$query_string = "insert into $table_select (";
		$columns = array();
		while(odbc_fetch_row($columns_row)) {
			$column_name = odbc_result($columns_row, 4);
			if ($column_name != 'id' && $_GET[$column_name] != '') {
				array_push($columns, $column_name);
			}
		}

		$query_string = $query_string.implode(', ', $columns).')';
		$query_string = $query_string.' VALUES (';

		$values = array();
		foreach($columns as $column) {
			array_push($values, "'".$_GET[$column]."'");
		}
		$query_string = $query_string.implode(', ', $values).')';

		odbc_exec($conn, $query_string) or die("Couldn't add record to database: ".odbc_errormsg());

		unset($_GET['create']);
	}

	odbc_close($conn);
	echo "Redireccionado...";
?>

<form action='/create.php' method='post' name='frm'>
<?php
echo "<input type='hidden' name='table_select' value='{$_GET['table_select']}'>";
echo "<input type='hidden' name='success' value='Renglon insertado correctamenten!'>";
?>
</form>
<script type="text/javascript">
	document.frm.submit();
</script>