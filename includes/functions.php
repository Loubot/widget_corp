<?php


	//This file is the place to store all functions
	function confirm_query($result_set){
		if (!$result_set) {
			die("Database query failed: ". mysql_error());
		}
	}

	function get_all_subjects(){
		global $connection;
		$query = "SELECT * 
							FROM subjects
							ORDER BY position ASC";

		$subject_set = mysql_query($query, $connection);
		confirm_query($subject_set);
		return $subject_set;
	}

	function get_pages_for_subjects($subject_id){
		global $connection;
		$query = "SELECT * 
							FROM pages 
							WHERE subject_id = {$subject_id}
							ORDER BY position ASC";

		$page_set = mysql_query($query, $connection);
		confirm_query($page_set);
		return $page_set;
	}

	function get_subject_by_id($subject_id){
		global $connection;
		$query = "SELECT * ";
		$query .= "FROM subjects ";
		$query .= "WHERE id = ". $subject_id . " ";
		$query .= "LIMIT 1";
		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);
		//if no rows are returne fetch array will return false
		if($subject = mysql_fetch_array($result_set)){
			return $subject;
		}else{
			return NULL;
		}
	}

	function get_page_by_id($page_id){
		global $connection;
		$query = "SELECT * ";
		$query .= "FROM pages ";
		$query .= "WHERE id = ". $page_id . " ";
		$query .= "LIMIT 1";
		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);
		if ($page = mysql_fetch_array($result_set)) {
			return $page;
		}else{
			return NULL;	
		}
	}
?>