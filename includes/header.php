<?php require_once('includes/functions.php'); ?>
<?php require_once('includes/session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
	<meta content="utf-8" http-equiv="encoding">
	<title>Widget Corp</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/login.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/custom.css">
	
	<script type="text/javascript" src="javascripts/jquery.js"></script>
	<script type="text/javascript" src="javascripts/bootstrap.js"></script>
	<script type="text/javascript" src="javascripts/bootstrap.min.js"></script>
	<script type="text/javascript" src="javascripts/jquery_button_goodness.js"></script>
</head>
<body>
	<?php
		if(!confirm_logged_in()){
			echo "<div class='container staff_header' >
						<div class='container-fluid'>
							<div class='page-header'><h1>Widget Corp <small><a class='pull-right' href='login.php'>Admin login</a></small></h1></div>
						</div> <!-- end of container-fluid -->
					</div> <!-- end of staff header -->";
		}else{
			echo "<div class='container staff_header' >
						<div class='container-fluid'>
							<div class='page-header'><h1>Widget Corp <small><a class='pull-right' href='logout.php'>Logout</a></small></h1></div>
						</div> <!-- end of container-fluid -->
					</div> <!-- end of staff header -->";
		}

	?>
	
	
		