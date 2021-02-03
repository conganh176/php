<?php 

if (isset($_POST['checkBoxArray'])) {
    foreach($_POST['checkBoxArray'] as $checkedValue) {
        $bulk_option = $_POST['bulk_options'];
        
        switch($bulk_option) {
            case 'published':
            case 'draft':
                $query = "UPDATE posts SET status = '{$bulk_option}' WHERE id = {$checkedValue} ";
                $update_query = mysqli_query($connection, $query);
                confirm($update_query);
                break;
            case 'delete':
                $query = "DELETE FROM posts WHERE id = {$checkedValue} ";
                $delete_query = mysqli_query($connection, $query);
                confirm($delete_query);
                break;
        }
    }
}

?>

<form action="" method="post">
                        <div id="bulkOptionContainer" class="col-xs-4" style="padding: 0px">
                            <select name="bulk_options" id="" class="form-control" >
                                <option value="">Select Option</option>
                                <option value="published">Publish</option>
                                <option value="draft">Draft</option>
                                <option value="delete">Delete</option>
                            </select>
                        </div>

                        <div class="col-xs-4">
                            <input type="submit" name="submit" class="btn btn-primary" value="Apply">
                            <a href="posts.php?source=add_post" class="btn btn-success">Add New</a>
                        </div>

                        <table class="table table-bordered table-hover">

                            <thead>
                                <tr>
                                    <th><input id="selectAllBoxes" type="checkbox"></th>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                
                                $query = "SELECT * FROM posts";
                                $get_all_posts = mysqli_query($connection, $query);
                                
                                while ($row = mysqli_fetch_assoc($get_all_posts)) {
                                    $post_id = $row['id'];
                                    $post_title = $row['title'];
                                    $post_author = $row['author'];
                                    $post_category = $row['category_id'];
                                    $post_date = $row['date'];
                                    $post_image = $row['image'];
                                    $post_tags = $row['tags'];
                                    $post_comments = $row['comment_count'];
                                    $post_status = $row['status'];

                                    echo "<tr>";
                                    echo "<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='{$post_id}'></td>";
                                    echo "<td>$post_id</td>";
                                    echo "<td>$post_author</td>";
                                    echo "<td>$post_title</td>";

                                    $query = "SELECT * FROM categories WHERE id = {$post_category} ";
                                        $get_category = mysqli_query($connection, $query);
                                            
                                        while ($row = mysqli_fetch_assoc($get_category)) {
                                            $post_category = $row['title'];
                                    } 

                                    echo "<td>$post_category</td>";
                                    echo "<td>$post_status</td>";
                                    echo "<td><img width='500px' class='img-responsive' src='../images/$post_image' alt='$post_image'></td>";
                                    echo "<td>$post_tags</td>";
                                    echo "<td>$post_comments</td>";
                                    echo "<td>$post_date</td>";
                                    echo "<td><a href='../post.php?id={$post_id}'>View</a></td>";
                                    echo "<td><a href='posts.php?source=edit_post&id={$post_id}'>Edit</a></td>";
                                    echo "<td><a onClick=\"javascript: return confirm('Confirm delete?')\" href='posts.php?delete={$post_id}'>Delete</a></td>";
                                    echo "</tr>";
                                }     

                                ?>
                            </tbody>
                        </table>
</form>

<?php 

if (isset($_GET['delete'])) {
    $deleted_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE id = {$deleted_id} ";
    $delete_query = mysqli_query($connection, $query);

    confirm($delete_query);
    header("Location: posts.php");
}

?>