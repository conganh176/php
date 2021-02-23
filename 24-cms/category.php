<?php include "includes/db.php" ?>
<?php include "admin/functions.php" ?>
<?php include "includes/header.php" ?>
    
    <!-- Navigation -->    
    <?php include "includes/navigation.php" ?>    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                    </h1>

                <?php

                if (isset($_GET['category'])) {
                    $category_id = $_GET['category'];

                }

                if(isAdmin($_SESSION['username'])) {
                    $statement1 = mysqli_prepare($connection, "SELECT id, title, author, date, image, content FROM posts WHERE category_id = ? ORDER BY id DESC ");
                } else {
                    $statement2 = mysqli_prepare($connection, "SELECT id, title, author, date, image, content FROM posts WHERE category_id = ? AND status = ? ORDER BY id DESC ");
                
                    $published = 'published';
                }

                if (isset($statement1)) {
                    mysqli_stmt_bind_param($statement1, 'i', $category_id);

                    mysqli_stmt_execute($statement1);

                    mysqli_stmt_bind_result($statement1, $post_id, $post_title, $post_author, $post_date, $post_image, $post_content);

                    $statement = $statement1;

                } else if (isset($statement2)) {
                    
                    mysqli_stmt_bind_param($statement2, 'is', $category_id, $published);

                    mysqli_stmt_execute($statement2);

                    mysqli_stmt_bind_result($statement2, $post_id, $post_title, $post_author, $post_date, $post_image, $post_content);
                
                    $statement = $statement2;
                }

                mysqli_stmt_store_result($statement);

                if (mysqli_stmt_num_rows($statement) < 1) {
                    echo "<h2>No post found in this category</h2>";
                } else {
                    while (mysqli_stmt_fetch($statement)) {
    
                        ?>
                        
                        <h2>
                            <a href="post.php?id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                        <hr>
                        <a href="post.php?id=<?php echo $post_id; ?>">
                            <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                        </a>
                        <hr>
                        <p><?php echo $post_content ?></p>
                        <a class="btn btn-primary" href="post.php?id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
    
                        <hr>
                    
                    <?php
    
                    }

                    mysqli_stmt_close($statement);
                }
                
                ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"?>

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php" ?>  