<?php

include "db.php";
include "functions.php";

createUser();

?>

<?php include "includes/header.php" ?>
	<div class="container">
		<h1>Register</h1>
		<div class="col-sm-6">
			<form action="register.php" method="post">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" class="form-control">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" class="form-control">
				</div>

				<input class="btn btn-primary mt-3" type="submit" name="submit" value="Submit">
			</form>
		</div>
	</div>
<?php include "includes/footer.php" ?>