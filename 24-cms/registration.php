<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<?php 

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password) && !empty($email)) {
        $username = mysqli_real_escape_string($connection, $username);
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

        // $query = "SELECT randSalt FROM users ";
        // $get_randSalt_query = mysqli_query($connection, $query);

        // if (!$get_randSalt_query) {
        //     die("Query failed: " . mysqli_error($connection));
        // }

        // $row = mysqli_fetch_array($get_randSalt_query);
        // $salt = $row['randSalt'];

        // $password = crypt($password, $salt);

        $query = "INSERT INTO users (username, email, password, role) ";
        $query .= "VALUES('{$username}', '{$email}', '{$password}', 'subscriber')";
        $register_query = mysqli_query($connection, $query);

        echo $register_query;

        if (!$register_query) {
            die("Query failed: " . mysqli_error($connection)) . ' ' . mysqli_errorno($connection);
        }

        $message = "Register completed!!!";
    } else {
        $message = "Field is empty!!!";
    }
} else {
    $message = '';
}

?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
        <section id="login">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="form-wrap">
                        <h1>Register</h1>
                            <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                                <?php echo $message; ?>
                                <div class="form-group">
                                    <label for="username" class="sr-only">username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                                </div>
                        
                                <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                            </form>
                        
                        </div>
                    </div> <!-- /.col-xs-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </section>


        <hr>



<?php include "includes/footer.php"; ?>
