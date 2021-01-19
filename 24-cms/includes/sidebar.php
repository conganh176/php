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
                                    $category_title = $row['title'];
                                    echo "<li><a href=\"#\">{$category_title}</a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->

                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php

                                $query = "SELECT * FROM CATEGORIES";
                                $get_sidebar_categories = mysqli_query($connection, $query);

                                while ($row = mysqli_fetch_assoc($get_sidebar_categories)) {
                                    $category_title = $row['title'];
                                    echo "<li><a href=\"#\">{$category_title}</a></li>";
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