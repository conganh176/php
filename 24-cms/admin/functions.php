<?php 

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