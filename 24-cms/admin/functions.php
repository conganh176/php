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
        echo "<td><a href='categories.php?delete={$category_id}'>Delete</a></td>";
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

?>