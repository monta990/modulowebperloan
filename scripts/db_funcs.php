<?php 
	
	$sql = array(driver=> "Driver={SQL Server Native Client 10.0}", dsn => "sql7001.site4now.net", username => "DB_A2BC3D_perloan_admin", password => "Elias986");
	$dbconf = array(database => "DB_A2BC3D_perloan", schema => "deudores");

	function db_connect() {
		global $sql;

		//$conn = odbc_connect ($sql['driver'], $sql['dsn'], $dbconf['database'], $dbconf['schema'], $sql['username'], $sql['password']); //п?дключення до джерела даних ODBC
		$conn = odbc_connect ("Driver={SQL Server Native Client 10.0};Server=sql7001.site4now.net;Database=DB_A2BC3D_perloan;", DB_A2BC3D_perloan_admin, Elias986);
		//$conn = odbc_connect ("$sql['driver'],$sql['dsn'],$dbconfig['database'];",$sql['username'],$sql['password']);
		//$conn = odbc_connect ($sql['driver'],$sql['dsn'],$dbconfig['database'],$sql['username'],$sql['password']);		
		if($conn === false) {
    		echo "No se puede conectar a $dsn \n";
		}
		return $conn;
	};
?>