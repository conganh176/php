            <div class="col-md-4">
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                        <div class="input-group">
                            <input name="search" type="text" class="form-control">
                            <span class="input-group-btn">
                                <button name="submit" class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Login -->
                <div class="well">
                    <?php if(isset($_SESSION['role'])): ?>

                        <h4>Logged in as <?php echo $_SESSION['username']; ?></h4>
                        <a href="admin/includes/logout.php" class="btn btn-primary">Logout</a>

                    <?php else: ?>

                        <h4>Login</h4>
                        <form action="includes/login.php" method="post">
                            <div class="form-group">
                                <input name="username" type="text" placeholder="Username" class="form-control">
                            </div>

                            <div class="form-group">
                                <input name="password" type="password" placeholder="Password" class="form-control">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-block" name="login" type="submit">Login</button>
                            </div>
                        </form>

                    <?php endif; ?>
                    
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php

                                $query = "SELECT * FROM CATEGORIES";
                                $get_sidebar_categories = mysqli_query($connection, $query);

                                while ($row = mysqli_fetch_assoc($get_sidebar_categories)) {
                                    $category_id = $row['id'];
                                    $category_title = $row['title'];
        
                                    echo "<li><a href='category.php?category={$category_id}'>{$category_title}</a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include "widget.php" ?>

            </div>