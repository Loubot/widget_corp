<?php
	//This file is the place to store all functions
	function confirm_query($result_set){
		if (!$result_set) {
			die("Database query failed: ". mysql_error());
		}
	}
?>