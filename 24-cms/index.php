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

                $limit = 3;

                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = "";
                }

                if ($page == "" || $page == 1) {
                    $page_1 = 0;
                } else {
                    $page_1 = ($page * $limit) - $limit;
                }

                //count posts
                $query = "SELECT * FROM POSTS WHERE status = 'published'";
                $get_all_posts = mysqli_query($connection, $query);
                $count = mysqli_num_rows($get_all_posts);

                $pages = ceil($count / $limit);

                //get posts
                $query = "SELECT * FROM POSTS WHERE status = 'published'";
                $query .= "ORDER BY id DESC ";
                $query .= "LIMIT $page_1, {$limit} ";
                $get_all_posts = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($get_all_posts)) {
                    $post_id = $row['id'];
                    $post_title = $row['title'];
                    $post_author = $row['author'];
                    $post_date = $row['date'];
                    $post_image = $row['image'];
                    $post_content = substr($row['content'], 0, 100);

                    ?>
                    
                    <h2>
                        <a href="post.php?id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="author_posts.php?author=<?php echo $post_author ?>"><?php echo $post_author ?></a>
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
                
                ?>
            
                

                <!-- Pager -->
                <ul class="pagination">
                    <?php 
                    
                    for ($i = 1; $i <= $pages; $i++) {
                        if ($i == $page) {
                            echo "<li class='page-item active'><a class='page-link' href='index.php?page=$i'>{$i}</a></li>";
                        } else {
                            echo "<li class='page-item'><a class='page-link' href='index.php?page=$i'>{$i}</a></li>";
                        }
                    }

                    ?>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"?>

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php" ?>  