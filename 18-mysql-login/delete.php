<?php 

include "db.php";
include "functions.php";

deleteUser();

?>

<?php include "includes/header.php" ?>
	<div class="container">
		<h1>Delete</h1>
		<div class="col-sm-6">
			<form action="delete.php" method="post">
				<div class="form-group">
					<label for="id">User ID:</label>
					<select class="form-control" name="id" id="">
						<?php 
							showAllUsersId();
						?>
					</select>
				</div>
				<input class="btn btn-danger mt-3" type="submit" name="submit" value="Delete">
			</form>
		</div>
	</div>
<?php include "includes/footer.php" ?>