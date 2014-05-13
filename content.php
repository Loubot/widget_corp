
<?php require_once('includes/connection.php'); ?>
<?php require_once('includes/functions.php'); ?>

<?php include('includes/header.php'); ?>
<?php
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
	
	
?>
<div class="container staff-container">
			<div class="container-fluid staff_body">
				<div class="col-md-3 staff-left">
					<?php
						$subject_set = get_all_subjects();

						echo "<div class='list-group'>";
						while ($subject = mysql_fetch_array($subject_set)) {
							echo "<a class='list-group-item";
							if ($subject['id'] == $sel_subject['id']) { echo " active"; }
							echo "' href='content.php?subj=" . urldecode($subject['id']) .
							"'><h4>{$subject["menu_name"]}</h4></a>";
							
							$page_set = get_pages_for_subjects($subject['id']);
														
							echo "<div class= 'list-group'>";
							while($page = mysql_fetch_array($page_set)){
								echo "<a class='list-group-item";
								if ($page['id'] == $sel_page['id']) { echo " active"; }
								echo "' href='content.php?page=".
								urldecode($page['id']) .
								"'>{$page['menu_name']}</a>";
							}
							echo "</div>";
						}

						echo "</div>";

						


					?>
				</div>
				<div class="col-md-9 staff-right">

					<div class="panel panel-default panel-primary">
						<div class="panel-heading">Staff menu</div>
						<div class="panel-body">Welcome to the staff area</div>
					</div> <!-- end of panel-default -->
					<?php
						if (!is_null($sel_subject)) {
							echo "<h2>{$sel_subject['menu_name']}</h2>";
						}elseif (!is_null($sel_page)) {
							echo "<div class='panel panel-default'>";
								echo "<div class='panel-heading'>";
									echo "<h2 class='panel-title'>{$sel_page['menu_name']}</h2>";
								echo "</div>"; //end of panel-heading
								echo "<div class='panel-body'>";
									echo "{$sel_page['content']}";
								echo "</div>"; //end of panel-body
							echo "</div>"; //end of panel_default
							
						}else{
							echo "<h2>Select a subject or page to edit</h2>";
						}
						
					?>

<?php include('includes/footer.php'); ?>

