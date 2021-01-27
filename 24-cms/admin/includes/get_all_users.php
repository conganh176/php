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
                                    <th>To Admin</th>
                                    <th>To Subscriber</th>
                                    <th>Edit</th>
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
                                    echo "<td><a href='users.php?admin={$user_id}'>To Admin</a></td>";
                                    echo "<td><a href='users.php?subscriber={$user_id}'>To Subscriber</a></td>";
                                    echo "<td><a href='users.php?source=edit_user&id={$user_id}'>Edit</a></td>";
                                    echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                                    echo "</tr>";
                                }     

                                ?>
                            </tbody>
                        </table>

<?php 

if (isset($_GET['delete'])) {
    $deleted_id = $_GET['delete'];

    //delete user
    $query = "DELETE FROM users WHERE id = {$deleted_id} ";
    $delete_query = mysqli_query($connection, $query);
    confirm($delete_query);
    
    header("Location: users.php");
}

if (isset($_GET['admin'])) {
    $user_id = $_GET['admin'];
    $query = "UPDATE users SET role = 'admin' WHERE id = {$user_id} ";
    $to_admin_query = mysqli_query($connection, $query);
    confirm($to_admin_query);

    header("Location: users.php");
}

if (isset($_GET['subscriber'])) {
    $user_id = $_GET['subscriber'];
    $query = "UPDATE users SET role = 'subscriber' WHERE id = {$user_id} ";
    $to_subscriber_query = mysqli_query($connection, $query);
    confirm($to_subscriber_query);

    header("Location: users.php");
}

?>