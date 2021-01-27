<?php include "db.php"; 
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE ";
    $query .= "username = '{$username}' ";
    $query .= "AND password = '{$password}' ";

    $get_user_query = mysqli_query($connection, $query);
    if (!$get_user_query) {
        die("Query failed: " . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_assoc($get_user_query)) {
        $user_id = $row['id'];
        $user_username = $row['username'];
        $user_password = $row['password'];
        $user_first = $row['firstname'];
        $user_lastname = $row['lastname'];
        $user_role = $row['role'];
    }

   if ($username === $user_username || $password === $user_password) {
        $_SESSION['username'] = $user_username;
        $_SESSION['firstname'] = $user_firstname;
        $_SESSION['lastname'] = $user_lastname;
        $_SESSION['role'] = $user_role;
        header("Location: ../admin");
    } else {
        header("Location: ../index.php");
    }
}

?>