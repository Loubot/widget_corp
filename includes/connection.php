<?php
	require("constants.php");
	//Create a database connection
	$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
	if (!$connection) {
		die("Database connection failed: " .mysql_error());
	}
	//select a database to use
	$db_select = mysql_select_db(DB_NAME, $connection);
	if (!$db_select) {
		die("Database selection failed" . mysql_error());
	}
	// //perform database query
	// $result = mysql_query("SELECT * FROM subjects", $connection);
	// if (!$result) {
	// 	die("Database query failed" . mysql_error());
	// }	
?>