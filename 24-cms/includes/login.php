<?php include "db.php"; 
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    //encrypt password
    // $query = "SELECT randSalt FROM users ";
    // $get_randSalt_query = mysqli_query($connection, $query);

    // if (!$get_randSalt_query) {
    //     die("Query failed: " . mysqli_error($connection));
    // }

    // $row = mysqli_fetch_array($get_randSalt_query);
    // $salt = $row['randSalt'];

    // $password = crypt($password, $salt);

    $query = "SELECT * FROM users WHERE ";
    $query .= "username = '{$username}' ";

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

    if (password_verify($password, $user_password)) {
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