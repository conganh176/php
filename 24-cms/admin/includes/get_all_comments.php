<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
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
                                    echo "<td><a href='posts.php?source=edit_post&id={$post_id}'>Edit</a></td>";
                                    echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                                    echo "</tr>";
                                }     

                                ?>
                            </tbody>
                        </table>

<?php 

if (isset($_GET['delete'])) {
    $deleted_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE id = {$deleted_id} ";
    $delete_query = mysqli_query($connection, $query);

    confirm($delete_query);
}

?>