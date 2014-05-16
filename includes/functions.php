<?php

	//This file is the place to store all 

	function mysql_prep($value){
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists("mysql_real_escape_string");
		if ($new_enough_php) {
			
			if ($magic_quotes_active) { $value = stripslashes($value); }
			$value = mysql_real_escape_string($value);
		}else{
			if (!magic_quotes_active) {	$value = addslashes($value); }
		}
		return $value;
	}

	function redirect_to($location = NULL){
		// if ($location != NULL) {
		// 	header("Location: {$location}");
		// 	exit;
		// }
		
	}

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

	function find_selected_page(){
		global $sel_subject;
		global $sel_page;
		if (isset($_GET['subj'])) {
			$sel_page = NULL;
			$sel_subject = get_subject_by_id($_GET['subj']);
		}elseif (isset($_GET['page'])) {
			$sel_subject = NULL;
			$sel_page = get_page_by_id($_GET['page']);
		}else{
			$sel_subject = NULL;
			$sel_page = NULL;
		}
	}

	function navigation($sel_subject, $sel_page){
		$subject_set = get_all_subjects();

		echo "<div class='list-group'>";
		while ($subject = mysql_fetch_array($subject_set)) {
			echo "<a class='list-group-item";
			if ($subject['id'] == $sel_subject['id']) { echo " active"; }
			echo "' href='edit_subject.php?subj=" . urldecode($subject['id']) .
			"'><h4>{$subject["menu_name"]}</h4></a>";
			
			$page_set = get_pages_for_subjects($subject['id']);
										
			echo "<div class= 'list-group'>";
			while($page = mysql_fetch_array($page_set)){
				echo "<a class='list-group-item";
				if ($page['id'] == $sel_page['id']) { echo " active"; }
				echo "' href='edit_subject.php?page=".
				urldecode($page['id']) .
				"'>{$page['menu_name']}</a>";
			}
			echo "</div>"; //end of inner list-group
		}		
	}

	function validate_form($submitted_data){
		$errors = array();
		$required_fields = array('menu_name', 'position', 'visible');
		foreach ($required_fields as $field_name) {
			if (!isset($submitted_data[$field_name]) || (empty($submitted_data[$field_name])) && $submitted_data[$fieldname] != 0) {
				$errors[] = $field_name;
			}
		}
		$fields_with_lengths = array('menu_name' => 30);
		foreach ($fields_with_lengths as $fieldname => $maxlength) {
			if (strlen(trim(mysql_prep($submitted_data[$fieldname]))) > $maxlength) {
				$errors[] = $fieldname;
			}
			
		}
		return $errors;

	}
	
?>