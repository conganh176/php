<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php include "admin/functions.php"; ?>

<?php 

$errors = [
    'username' => '',
    'email' => '',
    'password' => ''
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (strlen($username) < 4) {
        $errors['username'] = 'Username is shorter than 4';
    } 

    if ($username == '') {
        $errors['username'] = 'Username cannot be empty';
    }

    if (usernameExist($username)) {
        $errors['username'] = 'Username is already existed';
    }

    if ($email == '') {
        $errors['email'] = 'Email cannot be empty';
    }

    if (emailExist($email)) {
        $errors['email'] = 'Email is already existed';
    }

    if ($password == '') {
        $errors['password'] = 'Password cannot be empty';
    }

    $hasError = false;

    foreach ($errors as $key => $value) {

        if (!empty($value)) {
            $hasError = true;
        }
    }

    if ($hasError == false) {
        registerUser($username, $email, $password);
    }
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
                                <div class="form-group">
                                    <label for="username" class="sr-only">username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username"
                                    value='<?php echo isset($username) ? $username : '' ?>'>
                                    <p><?php echo $errors['username'] ? $errors['username'] : '' ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                    value='<?php echo isset($email) ? $email : '' ?>'>
                                    <p><?php echo $errors['email'] ? $errors['email'] : '' ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                                    <p><?php echo $errors['password'] ? $errors['password'] : '' ?></p>
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
