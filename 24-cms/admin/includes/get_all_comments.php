<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>In Response To</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Not Approve</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                
                                $query = "SELECT * FROM comments";
                                $get_all_comments = mysqli_query($connection, $query);
                                
                                while ($row = mysqli_fetch_assoc($get_all_comments)) {
                                    $comment_id = $row['id'];
                                    $comment_post = $row['post_id'];
                                    $comment_author = $row['author'];
                                    $comment_email = $row['email'];
                                    $comment_content = $row['content'];
                                    $comment_status = $row['status'];
                                    $comment_date = $row['date'];

                                    echo "<tr>";
                                    echo "<td>$comment_id</td>";
                                    echo "<td>$comment_author</td>";
                                    echo "<td>$comment_content</td>";

                                    // $query = "SELECT * FROM categories WHERE id = {$post_category} ";
                                    //     $get_category = mysqli_query($connection, $query);
                                            
                                    //     while ($row = mysqli_fetch_assoc($get_category)) {
                                    //         $post_category = $row['title'];
                                    // } 

                                    echo "<td>$comment_email</td>";
                                    echo "<td>$comment_status</td>";

                                    $query = "SELECT * FROM posts WHERE id = $comment_post ";
                                    $get_post_by_id = mysqli_query($connection, $query);

                                    while($row = mysqli_fetch_assoc($get_post_by_id)) {
                                        $post_id = $row['id'];
                                        $post_title = $row['title'];
                                    }
                                    echo "<td><a href='../post.php?id=$post_id'>{$post_title}</a></td>";

                                    echo "<td>$comment_date</td>";
                                    echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
                                    echo "<td><a href='comments.php?not_approve={$comment_id}'>Not Approve</a></td>";
                                    echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";
                                    echo "</tr>";
                                }     

                                ?>
                            </tbody>
                        </table>

<?php 

if (isset($_GET['delete'])) {
    $deleted_id = $_GET['delete'];

    //get post id
    $query = "SELECT * FROM comments where id = {$deleted_id} ";
    $get_comment = mysqli_query($connection, $query);
    confirm($get_comment);

    while ($row = mysqli_fetch_assoc($get_comment)) {
        $post_id = $row['post_id'];
    }

    //delete comment
    $query = "DELETE FROM comments WHERE id = {$deleted_id} ";
    $delete_query = mysqli_query($connection, $query);
    confirm($delete_query);

    //decrease number
    $query = "UPDATE posts SET comment_count = comment_count - 1 WHERE id = {$post_id} ";
    $decrease_query = mysqli_query($connection, $query);
    confirm($decrease_query);
    
    header("Location: comments.php");
}

if (isset($_GET['approve'])) {
    $approve_id = $_GET['approve'];
    $query = "UPDATE comments SET status = 'approved' WHERE id = {$approve_id} ";
    $approve_query = mysqli_query($connection, $query);
    confirm($approve_query);

    header("Location: comments.php");
}

if (isset($_GET['not_approve'])) {
    $not_approve_id = $_GET['not_approve'];
    $query = "UPDATE comments SET status = 'not_approved' WHERE id = {$not_approve_id} ";
    $not_approve_query = mysqli_query($connection, $query);
    confirm($not_approve_query);

    header("Location: comments.php");
}

?>