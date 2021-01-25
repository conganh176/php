<?php include 'includes/admin-header.php' ?>
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
                            <small>Author</small>
                        </h1>

                        <div class="col-xs-6">
                            <?php       //create query
                                add_category();
                            ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="title">Add Category</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Add Category" class="btn btn-primary">
                                </div>
                            </form>

                            <?php       //update category
                            
                                if (isset($_GET['edit'])) {
                                    $category_id = $_GET['edit'];

                                    include 'includes/update_category.php';
                                }

                            ?>

                        </div>

                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <?php       //get all categories

                                        find_all_categories();

                                    ?>

                                    <?php       //delete query

                                        delete_category();

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php include 'includes/admin-footer.php' ?>