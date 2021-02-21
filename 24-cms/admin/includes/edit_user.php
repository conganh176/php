<?php 

    if (isset($_GET['id'])) {
        $user_id = $_GET['id'];

        $query = "SELECT * FROM users WHERE id = {$user_id} ";
        $get_user_by_id = mysqli_query($connection, $query);
                                        
        while ($row = mysqli_fetch_assoc($get_user_by_id)) {
            $user_firstname = $row['firstname'];
            $user_lastname = $row['lastname'];
            $user_username = $row['username'];
            $user_email = $row['email'];
            $user_password = $row['password'];
            $user_image = $row['image'];
            $user_role = $row['role'];
            $user_randSalt = $row['randSalt'];
        }
    }

    if (isset($_POST['update_user'])) {
        $user_firstname = escape($_POST['firstname']);
        $user_lastname = escape($_POST['lastname']);
        $user_username = escape($_POST['username']);

        // $user_image = $_POST['image'];
        // $post_image = $_FILES['image']['name'];
        // $post_image_temp = $_FILES['image']['tmp_name'];

        $user_email = escape($_POST['email']);
        $user_password = escape($_POST['password']);
        $user_role = escape($_POST['role']);

        if (empty($user_image)) {
            $user_image = '';
        }

        if (!empty($user_password)) {
            $query = "SELECT password FROM users WHERE id = $user_id ";
            $get_user_password_query = mysqli_query($connection, $query);

            confirm($get_user_password_query);

            $row = mysqli_fetch_array($get_user_password_query);

            $db_password = $row['password'];
        } else {
            $hashedPassword = $user_password;
        }

        if ($db_password != $user_password) {
            $hashedPassword = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
        } else {
            $hashedPassword = $user_password;
        }

        $query = "UPDATE users SET ";
        $query .= "firstname = '{$user_firstname}', ";
        $query .= "lastname = '{$user_lastname}', ";
        $query .= "username = '{$user_username}', ";
        $query .= "email = '{$user_email}', ";
        $query .= "password = '{$hashedPassword}', ";
        // $query .= "image = '{$user_image}', ";
        $query .= "role = '{$user_role}' ";
        $query .= "WHERE id = {$user_id} ";

        $update_user = mysqli_query($connection, $query);
        confirm($update_user);

        echo "User updated.";
    }

?>

<form action="" method="post" enctype='multipart/form-data'>
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" value="<?php echo $user_firstname ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" value="<?php echo $user_lastname ?>" class="form-control">
    </div>
    <!-- <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" accept="image/*" class="form-control">
    </div> -->
    <div class="form-group">
        <label for="content">Username</label>
        <input type="text" name="username"  value="<?php echo $user_username ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="tags">Email</label>
        <input type="text" name="email"  value="<?php echo $user_email ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="status">Password</label>
        <input autocomplete="off" type="password" name="password" class="form-control">
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <select name="role" id="" class="form-control">
            <?php 
            
            if ($user_role == 'admin') {
                echo "<option value='subscriber'>Subscriber</option>";
                echo "<option value='admin' selected>Admin</option>";
            } else if ($user_role == 'subscriber') {
                echo "<option value='subscriber' selected>Subscriber</option>";
                echo "<option value='admin'>Admin</option>";
            }

            ?>
            
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="update_user" value="Update" class="btn btn-primary">
    </div>
</form>