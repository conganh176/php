<?php include "includes/db.php" ?>
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

                if (isset($_GET['id'])) {
                    $post_id = $_GET['id'];
                }

                $query = "SELECT * FROM posts WHERE id = $post_id";
                $get_post_by_id = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($get_post_by_id)) {
                    $post_title = $row['title'];
                    $post_author = $row['author'];
                    $post_date = $row['date'];
                    $post_image = $row['image'];
                    $post_content = $row['content'];

                    ?>
                    
                    <h2>
                        <a href="#"><?php echo $post_title ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                    <hr>
                    <p><?php echo $post_content ?></p>

                    <hr>
                
                <?php

                }
                
                ?>
            
                
                <!-- Blog Comments -->
                <?php 
                
                if (isset($_POST['add_comment'])) {
                    $post_id = $_GET['id'];
                    $author = $_POST['author'];
                    $email = $_POST['email'];
                    $content = $_POST['content'];

                    if (!empty($content) && !empty($author) && !empty($email)) {
                        $query = "INSERT INTO comments ";
                        $query .= "(post_id, author, email, content, status, date) ";
                        $query .= "VALUES ($post_id, '{$author}', '{$email}', '{$content}', 'not_approved', now()) ";

                        $add_comment_query = mysqli_query($connection, $query);

                        if (!$add_comment_query) {
                            die("Query failed: " . mysqli_error($connection));
                        }

                        $query = "UPDATE posts SET comment_count = comment_count + 1 WHERE id = {$post_id} ";
                        $increase_query = mysqli_query($connection, $query);
                        
                        if (!$increase_query) {
                            die("Query failed: " . mysqli_error($connection));
                        }
                    } else {
                        echo "<script>alert('The field cannot be empty!')</script>";
                    }

                    
                }
                
                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="add_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php 
                
                $query = "SELECT * FROM comments WHERE post_id = {$post_id} ";
                $query .= "AND status = 'approved' ";
                $query .= "ORDER BY id DESC ";

                $get_all_comments = mysqli_query($connection, $query);

                if (!$get_all_comments) {
                    die("Query failed: " . mysqli_error($connection));
                }

                while ($row = mysqli_fetch_assoc($get_all_comments)) {
                    $comment_date = $row['date'];
                    $comment_content = $row['content'];
                    $comment_author = $row['author'];
                    ?>
                
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>

                <?php

                }

                ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"?>

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php" ?>  