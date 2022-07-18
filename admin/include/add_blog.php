<?php

	if (isset($_POST['add_blog'])){
	$blog_title=$_POST['blog_title'];
	$blog_author=$_POST['blog_author'];
	$blog_cate_id=$_POST['blog_cate_id'];
	$blog_image=$_FILES['image']['name'];
	$blog_image_temp=$_FILES['image']['tmp_name'];
	$blog_keywords=$_POST['blog_keywords'];
	$blog_content=$_POST['blog_content'];
	$blog_status=$_POST['blog_status'];
	$blog_date=date('d-m-y');
//	$post_comment_count=4;
	
	move_uploaded_file($blog_image_temp, "../assets/images/$blog_image" );
	$query="INSERT INTO blogs (blog_title,blog_author,blog_cate_id,blog_image,blog_keywords,blog_content,blog_status,blog_date) VALUES ('{$blog_title}','{$blog_author}','{$blog_cate_id}','{$blog_image}','{$blog_keywords}','{$blog_content}','{$blog_status}',now())";

	$add_blog_query= mysqli_query($connection,$query);
    
    if(!$add_blog_query){
                        die("Query Failed". mysqli_error($connection));
                    }}

?>
	
<form action=""  method="post" enctype="multipart/form-data">
    <div class="from-group mt-2">
        <label for="title">Blog Title</label>
        <input type="text" class="form-control" name="blog_title">
    </div>
    <div class="form-group mt-2">
    	<label for="author">Author</label>
       	<input type="text" class="form-control" name="blog_author">
     </div>
    <div class="from-group mt-2">
       <label for="cate_id">Categories </label><br>
        <select name="blog_cate_id" id=""  class="form-control"> 
           <option value="">Select Options</option>
            <?php
            $query= "select * from category";
            $select_categories= mysqli_query($connection,$query);
                
            while($row=mysqli_fetch_assoc($select_categories)){
                $cat_id=$row['cat_id'];
                $cat_title=$row['cat_title'];
                
                echo "<option value='$cat_id'>{$cat_title}</option>";
            }
            ?>
        </select>
        
    	</div>
    <div class="from-group mt-2">
        <label for="image">Image</label>
        <input type="file" name="image" class="form-control" >
    </div>
    <div class="from-group mt-2">
        <label for="keyword">KeyWords</label>
        <input type="text" class="form-control" name="blog_keywords">
    </div>
    <div class="from-group mt-2">
        <label for="contents">Detail</label>
        <textarea name="blog_content" class="form-control" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="from-group mt-2">
        <label for="status">Status</label>
        <select name="blog_status" id="" class="form-control" >
            <option value="draft">Select Options</option>
            <option value="draft">Draft</option>
            <option value="published">Publish</option>
        </select>
    </div>
    <div class="from-group mt-2">
        <input class="btn btn-primary" type="submit" name="add_blog" value="Add Blog">
    </div>
</form>