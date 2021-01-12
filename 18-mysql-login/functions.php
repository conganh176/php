<?php 

include "db.php";

	function showAllUsersId() {
		global $connection;
		
		$query = "SELECT * FROM Users";
		$result = mysqli_query($connection, $query);

		if (!$result) {
			die("Query failed: " . mysqli_error());
		}

		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row['id'];
			echo "<option value='$id'>$id</option>";
		}
	}

	function showAllUserInfos() {
		global $connection;
		
		$query = "SELECT * FROM Users";
		$result = mysqli_query($connection, $query);

		if (!$result) {
			die("Query failed: " . mysqli_error());
		}

		while ($row = mysqli_fetch_assoc($result)) {
			print_r($row);
		}
	}

	function createUser() {
		global $connection;

		if(isset($_POST['submit'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];

			//secure check
			$username = mysqli_real_escape_string($connection, $username);
			$password = mysqli_real_escape_string($connection, $password);

			//encrypt password
			$hashFormat = "$2y$10$";
			$salt = "thisisareallylongpass6";
			$hash_and_salt = $hashFormat . $salt;
			$encryptedPassword = crypt($password, $hash_and_salt);
		
			$query = "INSERT INTO users(username, password) ";
			$query .= "VALUES ('$username', '$encryptedPassword')";
		
			$result = mysqli_query($connection, $query);
		
			if (!$result) {
				die("Query failed: " . mysqli_error());
			} else {
				echo "<h3>Account Created!</h3>";
			}
		}
	}

	function updateUser() {
		global $connection;
		
		if (isset($_POST['submit'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$id = $_POST['id'];
			
			$query = "UPDATE Users SET ";
			$query .= "username = '$username', ";
			$query .= "password = '$password' ";
			$query .= "WHERE id = '$id' ";

			$result = mysqli_query($connection, $query);

			if (!$result) {
				die("Error update user: " . mysqli_error($connection));
			} else {
				echo "<h3>Account Updated!</h3>";
			}
		}
	}

	function deleteUser() {
		global $connection;

		if (isset($_POST['submit'])) {
			$id = $_POST['id'];
			
			$query = "DELETE FROM Users ";
			$query .= "WHERE id = '$id' ";

			$result = mysqli_query($connection, $query);

			if (!$result) {
				die("Error update user: " . mysqli_error($connection));
			} else {
				echo "<h3>Account Deleted!</h3>";
			}
		}
	}

?>