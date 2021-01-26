                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Image</th>
                                    <th>Approve</th>
                                    <th>Not Approve</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                
                                $query = "SELECT * FROM users";
                                $get_all_users = mysqli_query($connection, $query);
                                
                                while ($row = mysqli_fetch_assoc($get_all_users)) {
                                    $user_id = $row['id'];
                                    $user_username = $row['username'];
                                    $user_password = $row['password'];
                                    $user_first = $row['firstname'];
                                    $user_last = $row['lastname'];
                                    $user_email = $row['email'];
                                    $user_role = $row['role'];
                                    $user_image = $row['image'];

                                    echo "<tr>";
                                    echo "<td>$user_id</td>";
                                    echo "<td>$user_username</td>";
                                    echo "<td>$user_password</td>";
                                    echo "<td>$user_first</td>";
                                    echo "<td>$user_last</td>";
                                    echo "<td>$user_email</td>";
                                    echo "<td>$user_role</td>";
                                    echo "<td></td>";
                                    echo "<td><a href='users.php?approve={$user_id}'>Approve</a></td>";
                                    echo "<td><a href='users.php?not_approve={$user_id}'>Not Approve</a></td>";
                                    echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
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