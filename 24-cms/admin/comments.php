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

                        <?php 
                        
                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        } else {
                            $source = '';
                        }

                        switch ($source) {
                            case 'add_comment':
                                include 'includes/add_comment.php';
                                break;

                            case 'edit_comment':
                                include 'includes/edit_comment.php';
                                break;

                            case 'post_comment':
                                include 'includes/post_comments.php';
                                break;

                            default:
                                include 'includes/get_all_comments.php';
                                break;
                        }

                        ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php include 'includes/admin-footer.php' ?>