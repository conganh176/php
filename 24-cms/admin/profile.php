<?php include 'includes/admin-header.php' ?>
<?php 

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $get_user_query = mysqli_query($connection, $query);
    confirm($get_user_query);

    while ($row = mysqli_fetch_assoc($get_user_query)) {
        $user_id = $row['id'];
        $user_username = $row['username'];
        $user_password = $row['password'];
        $user_firstname = $row['firstname'];
        $user_lastname = $row['lastname'];
        $user_email = $row['email'];
        $user_role = $row['role'];
        $user_image = $row['image'];

    }
}

if (isset($_POST['update_user'])) {
    $user_firstname = $_POST['firstname'];
    $user_lastname = $_POST['lastname'];
    $user_username = $_POST['username'];

    // $user_image = $_POST['image'];
    // $post_image = $_FILES['image']['name'];
    // $post_image_temp = $_FILES['image']['tmp_name'];

    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $user_role = $_POST['role'];
    // $user_randSalt = $_POST['randSalt'];

    // move_uploaded_file($post_image_temp, "../images/{$post_image}" );

    if (empty($user_image)) {
        $user_image = '';
    }

    $query = "UPDATE users SET ";
    $query .= "firstname = '{$user_firstname}', ";
    $query .= "lastname = '{$user_lastname}', ";
    $query .= "username = '{$user_username}', ";
    $query .= "email = '{$user_email}', ";
    $query .= "password = '{$user_password}', ";
    // $query .= "image = '{$user_image}', ";
    $query .= "role = '{$user_role}' ";
    // $query .= "randSalt = '', ";
    $query .= "WHERE username = '{$username}' ";

    $update_user = mysqli_query($connection, $query);
    confirm($update_user);
}

?>

    <div id="wrapper">
        <!-- Navigation -->
        <?php include 'includes/admin-navigation.php' ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin Page
                            <small><?php echo $_SESSION['username'] ?></small>
                        </h1>

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
                                <input type="password" name="password" value="<?php echo $user_password ?>" class="form-control">
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

                        <?php 
                        
                        

                        ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php include 'includes/admin-footer.php' ?>