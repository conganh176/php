    <?php session_start() ?>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php

                        $query = "SELECT * FROM CATEGORIES";
                        $get_all_categories = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($get_all_categories)) {
                            $category_id = $row['id'];
                            $category_title = $row['title'];

                            echo "<li><a href='category.php?category={$category_id}'>{$category_title}</a></li>";
                        }
                    ?>
                    <li><a href="admin">Admin</a>
                    <li><a href="registration.php">Register</a>
                    <li><a href="contact.php">Contact</a>

                    <?php 
                    
                    if (isset($_SESSION['role'])) {
                        if (isset($_GET['id'])) {
                            $post_id = $_GET['id'];
                            echo "<li><a href='admin/posts.php?source=edit_post&id={$post_id}'>Edit Post</a></li>";
                        }
                    }
                    
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>