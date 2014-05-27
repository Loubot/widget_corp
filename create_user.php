<?php require_once('includes/connection.php'); ?>
<?php require_once('includes/functions.php'); ?>
<?php echo headers_sent(); ?>
<?php 	
	$message = NULL;
	$error = NULL;
	if (isset($_POST['submit'])) {
		$password = hash('whirlpool', $_POST['password']);
		$query = "INSERT INTO
						users (
							first_name, last_name, username, hashed_password
							) VALUES (
							'{$_POST['firstname']}','{$_POST['lastname']}','{$_POST['username']}','{$password}')";
		$result = mysql_query($query, $connection);
		if(mysql_affected_rows() == 1){
			$message = "User created successfully";
		}else{
			$error = "An error occured";
		}
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
					
					
					<div class="container">
    				<div class="row">
    					<div class="col-xs-1 col-sm-1 col-md-1"></div>
        			<div class="col-xs-11 col-sm-11 col-md-4 well well-sm">
        				<?php if($message){echo "<div class='alert alert-success'>{$message}</div>";} ?>
        				<?php if($error){echo "<div class='alert alert-danger'>{$error}</div>";} ?>
            <legend><!-- <a href="http://www.jquery2dotnet.com"> --><!-- <span class="glyphicon glyphicon-heart"></span> --></a> Sign up!</legend>
            <form action="create_user.php" method="post" class="form" role="form">
	            <div class="row">
	                <div class="col-xs-6 col-md-6">
                    <input class="form-control" name="firstname" placeholder="First Name" type="text"
                        required autofocus />
	                </div>
	                <div class="col-xs-6 col-md-6">
	                    <input class="form-control" name="lastname" placeholder="Last Name" type="text" required />
	                </div>
	            </div>
			            <input class="form-control" name="youremail" placeholder="Your Email" type="email" />
			            <input class="form-control" name="reenteremail" placeholder="Re-enter Email" type="email" />
			            <input class="form-control" name="password" placeholder="New Password" type="password" />
			            <input class="form-control" name="username" placeholder="username" type="text" />
			            <!-- <label for="">
		                Birth Date</label> -->
		            <!-- <div class="row">
		                <div class="col-xs-4 col-md-4">
		                    <select class="form-control">
		                        <option value="Month">Month</option>
		                    </select>
		                </div>
		                <div class="col-xs-4 col-md-4">
		                    <select class="form-control">
		                        <option value="Day">Day</option>
		                    </select>
		                </div>
		                <div class="col-xs-4 col-md-4">
		                    <select class="user-create-form-control">
		                        <option value="Year">Year</option>
		                    </select>
		                </div>
		            </div> -->
		            <!-- <label class="radio-inline">
		                <input type="radio" name="sex" id="inlineCheckbox1" value="male" />
		                Male
		            </label> -->
		            <!-- <label class="radio-inline">
		                <input type="radio" name="sex" id="inlineCheckbox2" value="female" />
		                Female
		            </label> -->
				            <br />
				            <br />
			            <button class="btn btn-lg btn-primary btn-block" name='submit' type="submit">
			                Sign up</button>
			            </form>
			        </div>
			    </div>
			</div>
					        
					
				</div> <!-- end of col-xs-12 col-sm-12 col-md-12 -->
			</div> <!-- end or row -->



<?php include('includes/footer.php'); ?>		