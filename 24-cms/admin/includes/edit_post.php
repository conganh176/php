<?php 

if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    $query = "SELECT * FROM posts WHERE id = {$post_id} ";
    $get_post_by_id = mysqli_query($connection, $query);
                                    
    while ($row = mysqli_fetch_assoc($get_post_by_id)) {
        $post_title = $row['title'];
        $post_author = $row['author'];
        $post_category = $row['category_id'];
        $post_date = $row['date'];
        $post_image = $row['image'];
        $post_content = $row['content'];
        $post_tags = $row['tags'];
        $post_comments = $row['comment_count'];
        $post_status = $row['status'];
        $backup_image = $post_image;
    }

    if (isset($_POST['update_post'])) {
        $post_title = $_POST['title'];
        $post_author = $_POST['author'];
        $post_category = $_POST['category_id'];

        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        $post_content = $_POST['content'];
        $post_tags = $_POST['tags'];
        $post_status = $_POST['status'];

        $post_date = $_POST['date'];
        $post_comments = $_POST['comments'];

        move_uploaded_file($post_image_temp, "../images/{$post_image}" );

        if (empty($post_image)) {
            $post_image = $backup_image;
        }

        $query = "UPDATE posts SET ";
        $query .= "title = '{$post_title}', ";
        $query .= "category_id = '{$post_category}', ";
        $query .= "author = '{$post_author}', ";
        $query .= "content = '{$post_content}', ";
        $query .= "tags = '{$post_tags}', ";
        $query .= "status = '{$post_status}', ";
        $query .= "date = '{$post_date}', ";
        $query .= "comment_count = '{$post_comments}', ";
        $query .= "image = '{$post_image}' ";
        $query .= "WHERE id = {$post_id} ";

        $update_post = mysqli_query($connection, $query);
        confirm($update_post);

        echo "<h5>Post Updated. <a href='../post.php?id={$post_id}'>View post</a></h5>";
    }
}

?>

<form action="" method="post" enctype='multipart/form-data'>
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" name="title" value="<?php echo $post_title; ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" value="<?php echo $post_author; ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="category_id">Category</label>
        <select name="category_id" id="post_category" class="form-control">
        <?php 
        
        $query = "SELECT * FROM categories";
        $select_categories = mysqli_query($connection, $query);

        confirm($select_categories);
        
        while ($row = mysqli_fetch_assoc($select_categories)) {
            $category_id = $row['id'];
            $category_title = $row['title'];

            echo "<option value=$category_id>{$category_title}</option>";
        }

        ?>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" accept="image/*" class="form-control">
        <img src="../images/<?php echo $post_image ?>" width="300" alt="">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea type="text" name="content" class="form-control" id="body" rows="10"><?php echo $post_content; ?>
        </textarea>
    </div>
    <div class="form-group">
        <label for="tags">Tags</label>
        <input type="text" name="tags" value="<?php echo $post_tags; ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="post_status" class="form-control">
            <?php 
            
            if ($post_status === 'draft') {
                echo "<option value='draft' selected>Draft</option>";
                echo "<option value='published'>Published</option>";
            } else if ($post_status === 'published') {
                echo "<option value='draft'>Draft</option>";
                echo "<option value='published' selected>Published</option>";
            }

            ?>

        </select>
    </div>
    <div class="form-group">
        <label for="status">Comments Count</label>
        <input type="text" name="comments" value="<?php echo $post_comments; ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="status">Date</label>
        <input type="text" name="date" value="<?php echo $post_date; ?>" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" name="update_post" value="Update Post" class="btn btn-primary">
    </div>
</form>