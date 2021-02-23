                            <hr>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="title">Edit Category</label>

                                    <?php       //update category
                                    
                                        if (isset($_GET['edit'])) {
                                            $edited_id = $_GET['edit'];

                                            $query = "SELECT * FROM categories WHERE id = {$edited_id} ";
                                            $get_category = mysqli_query($connection, $query);
                                            
                                            while ($row = mysqli_fetch_assoc($get_category)) {
                                                $category_id = $row['id'];
                                                $category_title = $row['title'];
                                                ?>

                                                <input value="<?php if (isset($category_title)) { echo $category_title; } ?>" type="text" class="form-control" name="title">

                                                <?php 
                                            } 
                                        }

                                    ?>

                                    <?php       //update query
                                    
                                    if (isset($_POST['update'])) {
                                        $update_title = escape($_POST['title']);

                                        $statement = mysqli_prepare($connection, "UPDATE categories SET title = ? WHERE id = ? ");
    
                                        mysqli_stmt_bind_param($statement, 'si', $update_title, $category_id);

                                        mysqli_stmt_execute($statement);

                                        if (!$statement) {
                                            die("Query failed: " . mysqli_error($connection));
                                        }

                                        mysqli_stmt_close($statement);

                                        header("Location: categories.php");
                                    }
                                    
                                    ?>
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="update" value="Update" class="btn btn-primary">
                                </div>
                            </form>