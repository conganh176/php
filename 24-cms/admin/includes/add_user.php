<?php 

if (isset($_POST['submit'])) {
    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category = $_POST['category_id'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_content = $_POST['content'];
    $post_tags = $_POST['tags'];
    $post_status = $_POST['status'];

    $post_date = date('d-m-y');
    $post_comments = 0;

    move_uploaded_file($post_image_temp, "../images/{$post_image}" );

    $query = "INSERT INTO posts(category_id, title, author, date, image, content, tags, comment_count, status) ";
    $query .= "VALUES({$post_category}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_comments}', '{$post_status}') ";

    $create_post_query = mysqli_query($connection, $query);

    confirm($create_post_query);
}

?>

<form action="" method="post" enctype='multipart/form-data'>
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" name="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" class="form-control">
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
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea type="text" name="content" class="form-control" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label for="tags">Tags</label>
        <input type="text" name="tags" class="form-control">
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <input type="text" name="status" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Publish Post" class="btn btn-primary"">
    </div>
</form>