<?php require_once('includes/functions.php'); ?>
<?php require_once('includes/connection.php'); ?>
<?php 
	if (isset($_POST['submit'])) {
		$hashed_password = hash('whirlpool', $_POST['password']);
		$query = "SELECT * FROM 
							users WHERE 
							username = '{$_POST['username']}' AND 
							hashed_password = '${hashed_password}'";
		//echo $query;
		$result_set = mysql_query($query, $connection);
		if(mysql_affected_rows() == 1) {$user = mysql_fetch_array($result_set); redirect_to('staff.php'); }
	}
?>
<?php require_once('includes/header.php'); ?>
<div class="container staff-container">
	<div class="container-fluid staff_body">
		<div class="col-md-3 staff-left">
			<?php
				echo public_navigation($sel_subject, $sel_page);

				
				echo "</div>"; //end of out list-group
			?>
		</div> <!-- end of staff-left -->

		<div class="col-md-9 staff-right">
			<div class="row">
				<div class="col-xs-11 col-sm-11 col-md-11">
					
						<div class="login-container">
	            <div id="output"></div>
	            <div class="avatar"></div>
	            <div class="form-box">
	                <form action="login.php" method="post">
	                    <input name="username" type="text" placeholder="username">
	                    <input type="password" name="password" placeholder="password">
	                    <button class="btn btn-info btn-block login" name='submit' type="submit">Login</button>
	                </form>
	            </div> <!-- end of form-box -->
	        	</div> <!-- end of login container -->
					        
					
				</div> <!-- end of col-xs-12 col-sm-12 col-md-12 -->
			</div> <!-- end or row -->



<?php include('includes/footer.php'); ?>		