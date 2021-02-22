<?php 

function redirect($location) {
    return header("Location: " . $location);
}

function escape($string) {
    global $connection;
    return mysqli_real_escape_string($connection, trim($string));
}

function recordCount($table) {
    global $connection;

    $query = "SELECT * FROM " . $table;
    $get_all = mysqli_query($connection, $query);
    
    $result = mysqli_num_rows($get_all);
    confirm($result);
    return $result;
}

function checkWithStatus($table, $column, $status) {
    global $connection;

    $query = "SELECT * FROM $table WHERE $column = '$status' ";
    $get_all_with_status = mysqli_query($connection, $query);
    
    $result = mysqli_num_rows($get_all_with_status);
    confirm($result);
    return $result;
}

function add_category() {
    global $connection;

    if(isset($_POST['submit'])) {
        $title = $_POST['title'];
        if ($title == '' || empty($title)) {
            echo "The field is empty";
        } else {
            $query = "INSERT INTO categories(title) ";
            $query .= "VALUE('{$title}') ";
    
            $create_category_query = mysqli_query($connection, $query);
    
            if (!$create_category_query) {
                die("Query failed: " . mysqli_error($connection));
            }
    
            header("Location: categories.php");
        }
    }
}

function find_all_categories() {
    global $connection;

    $query = "SELECT * FROM CATEGORIES";
    $get_all_categories = mysqli_query($connection, $query);
    
    while ($row = mysqli_fetch_assoc($get_all_categories)) {
        $category_id = $row['id'];
        $category_title = $row['title'];
        echo "<tr>";
        echo "<td>{$category_id}</td>";
        echo "<td>{$category_title}</td>";
        echo "<td><a onClick=\"javascript: return confirm('Confirm delete?')\" href='categories.php?delete={$category_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$category_id}'>Edit</a></td>";
        echo "</tr>";
    }     
}

function delete_category() {
    global $connection;

    if (isset($_GET['delete'])) {
        $deleted_id = $_GET['delete'];
        
        $query = "DELETE FROM categories WHERE id = {$deleted_id} ";
        $delete_query = mysqli_query($connection, $query);

        if (!$delete_query) {
            die("Query failed: " . mysqli_error($connection));
        }

        header("Location: categories.php");
    }
}

function isAdmin($username = '') {
    global $connection;

    $query = "SELECT role FROM users WHERE username = '$username' ";
    $result = mysqli_query($connection, $query);

    confrim($result);

    $row = mysqli_fetch_array($result);

    if ($row['role'] == 'admin') {
        return true;        
    } else {
        return false;
    }
}

function usernameExist($username) {
    global $connection;

    $query = "SELECT username FROM users WHERE username = '$username' ";
    $result = mysqli_query($connection, $query);

    confirm($result);

    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

function emailExist($email) {
    global $connection;

    $query = "SELECT email FROM users WHERE email = '$email' ";
    $result = mysqli_query($connection, $query);

    confirm($result);

    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

function registerUser($username, $email, $password) {
    global $connection;

    $username = mysqli_real_escape_string($connection, $username);
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);

    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

    $query = "INSERT INTO users (username, email, password, role) ";
    $query .= "VALUES('{$username}', '{$email}', '{$password}', 'subscriber')";
    $register_query = mysqli_query($connection, $query);

    confirm($register_query);
}

function loginUser($username, $password) {
    global $connection;

    $username = trim($username);
    $password = trim($password);

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

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
        header("Location: admin");
    } else {
        header("Location: index.php");
    }
}

function confirm($result) {
    global $connection;

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }
}

function users_online() {
    if (isset($_GET['onlineusers'])) {
        global $connection;

        if (!$connection) {
            session_start();
            include('../includes/db.php');
        }

        $session = session_id();
        $time = time();
        $timeout_in_seconds = 30;
        $timeout = $time - $timeout_in_seconds;

        $query = "SELECT * FROM online WHERE session = '{$session}' ";
        $get_user_session = mysqli_query($connection, $query);
        $count = mysqli_num_rows($get_user_session);

        if ($count == NULL) {
            mysqli_query($connection, "INSERT INTO online(session, time) VALUES('$session', '$time') ");
        } else {
            mysqli_query($connection, "UPDATE online SET time = '$time' WHERE session = '{$session}' " );
        }

        $online_users = mysqli_query($connection, "SELECT * FROM online WHERE time > $timeout ");
        echo $online_users_count = mysqli_num_rows($online_users);
    }
}

users_online();

?>