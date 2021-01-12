<?php 

include "db.php";
include "functions.php";

?>

<?php include "includes/header.php" ?>
	<div class="container">
		<h1>Read Users</h1>
		<div class="col-sm-6">
			<pre class="bg-light p-3">
				<?php 
					showAllUserInfos();
				?>
			</pre>
		</div>
	</div>
<?php include "includes/footer.php" ?>