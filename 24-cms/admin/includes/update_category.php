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
                                        $update_title = $_POST['title'];
                                        
                                        $query = "UPDATE categories SET title = '{$update_title}' WHERE id = {$category_id} ";
                                        $update_query = mysqli_query($connection, $query);

                                        if (!$update_query) {
                                            die("Query failed: " . mysqli_error($connection));
                                        }

                                        header("Location: categories.php");
                                    }
                                    
                                    ?>
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="update" value="Update" class="btn btn-primary">
                                </div>
                            </form>