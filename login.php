<?php require_once('includes/functions.php'); ?>
<?php require_once('includes/session.php'); ?>
<?php require_once('includes/connection.php'); ?>
<?php 
	if(confirm_logged_in()){ redirect_to('content.php'); }
	$message = NULL;
	if (isset($_POST['submit'])) {
		$hashed_password = hash('whirlpool', $_POST['password']);
		$query = "SELECT id, username 
							FROM users 
							WHERE username = '{$_POST['username']}' 
							AND hashed_password = '${hashed_password}'";
		//echo $query;
		$result_set = mysql_query($query, $connection);
		if(mysql_affected_rows() == 1) {
			$user = mysql_fetch_array($result_set);
			$_SESSION['user_id'] = $user['id'];
			$_SESSION['username'] = $user['username'];
			redirect_to('staff.php');
		}else{
			$message = "Username/password combination incorrect. <br>Please make sure your capslock  is off and try again.";
		}
	}
?>
<?php require_once('includes/header.php'); ?>
<div class="container staff-container">
	<div class="container-fluid staff_body">
		<div class="col-md-3 staff-left">
			<?php
				find_selected_page();
				echo public_navigation($sel_subject, $sel_page);

				
				echo "</div>"; //end of out list-group
			?>
		</div> <!-- end of staff-left -->

		<div class="col-md-9 staff-right">
			<div class="row">
				<div class="col-xs-11 col-sm-11 col-md-11">
						<?php
							if ($message) { echo "<div class='alert alert-danger'>{$message}</div>"; }
							if (isset($_GET['logout']) && $_GET['logout'] == 1){
								echo "<div class='alert alert-success'>You have been successfully logged out</div>";
							}
						?>
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