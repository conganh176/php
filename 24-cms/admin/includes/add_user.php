<?php 

if (isset($_POST['submit'])) {
    $user_firstname = escape($_POST['firstname']);
    $user_lastname = escape($_POST['lastname']);
    $user_username = escape($_POST['username']);

    // $post_image = $_FILES['image']['name'];
    // $post_image_temp = $_FILES['image']['tmp_name'];

    $user_email = escape($_POST['email']);
    $user_password = escape($_POST['password']);
    $user_image = '';
    $user_role = escape($_POST['role']);

    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

    // move_uploaded_file($post_image_temp, "../images/{$post_image}" );

    $query = "INSERT INTO users(username, password, firstname, lastname, email, image, role, randSalt) ";
    $query .= "VALUES('{$user_username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_image}', '{$user_role}', '' )";

    $create_user_query = mysqli_query($connection, $query);

    confirm($create_user_query);

    echo "<h5>User created: ". "<a href='users.php'>View User</a></h5>";
}

?>

<form action="" method="post" enctype='multipart/form-data'>
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" class="form-control">
    </div>
    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" class="form-control">
    </div>
    <!-- <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" accept="image/*" class="form-control">
    </div> -->
    <div class="form-group">
        <label for="content">Username</label>
        <input type="text" name="username" class="form-control">
    </div>
    <div class="form-group">
        <label for="tags">Email</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="status">Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <select name="role" id="" class="form-control">
            <option value="subscriber">Subscriber</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="New User" class="btn btn-primary"">
    </div>
</form>