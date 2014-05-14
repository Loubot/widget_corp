<?php require_once('includes/connection.php'); ?>
<?php require_once('includes/functions.php'); ?>

<?php
	$errors = array();
	if (!isset($_POST['menu_name']) || empty($_POST['menu_name'])) {
		$errors[] = 'menu_name';
	}

	if (!empty($errors)) {
		redirect_to("new_subject.php");
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
	if (mysql_query($query, $connection)) {
		//Success
		redirect_to('content.php');
	}else{
		//Display error message
		echo "<p>Subject creation failed</p>";
		echo "<p>{mysql_error()}</p>";
	}
?>

<?php mysql_close($connection); ?>