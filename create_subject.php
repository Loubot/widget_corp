<?php require_once('includes/connection.php'); ?>
<?php require_once('includes/functions.php'); ?>

<?php
	
	$errors = array();
	$required_fields = array('menu_name', 'position', 'visible');
	foreach ($required_fields as $field_name) {
		if (!isset($_POST[$field_name]) || empty($_POST[$field_name])) {
			$errors[] = $field_name;
		}
	}
	$fields_with_lengths = array('menu_name' => 30);
	foreach ($fields_with_lengths as $fieldname => $maxlength) {
		if (strlen(trim(mysql_prep($_POST[$fieldname]))) > $maxlength) {
			$errors[] = $fieldname;
		}
		
		if (!empty($errors)) {
			redirect_to("new_subject.php");
		}	
	}
?>

<?php 	
	$menu_name = $_POST['menu_name'];
	$position = $_POST['position'];
	echo $position;
	$visible = $_POST['visible'];
?>

<?php

	$query = "INSERT INTO subjects (
						menu_name, position, visible
						) VALUES (
						'{$menu_name}', {$position}, {$visible}
						)";
	echo "menu_name {$menu_name} <br>";
	echo "position {$position} <br>";
	echo "visible {$visible} <br>";
	echo $query;
	if (mysql_query($query, $connection)) {
		//Success
		redirect_to('content.php');
	}else{
		//Display error message
		echo "<p>Subject creation failed</p>";
		echo "<p>". mysql_error() ."</p>";
	}
?>

<?php mysql_close($connection); ?>