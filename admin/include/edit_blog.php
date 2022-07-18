<?php

if(isset($_GET['b_id'])){
	$the_blog_id=$_GET['b_id'];
	}
	$query= "SELECT * FROM blogs WHERE blog_id=$the_blog_id";
    $select_before_edit_blog= mysqli_query($connection,$query);
    
    while($row=mysqli_fetch_assoc($select_before_edit_blog)){
        
        $blog_id=$row['blog_id'];
       	$blog_title=$row['blog_title'];
		$blog_author=$row['blog_author'];
		$blog_date=$row['blog_date'];
		$blog_image=$row['blog_image'];
		$blog_cate_id=$row['blog_cate_id'];
		$blog_keywords=$row['blog_keywords'];
		$blog_status=$row['blog_status'];
		$blog_comment=$row['blog_comment'];
		$blog_content=$row['blog_content'];
	}?>
	<?php
	if (isset($_POST['update_blog'])){
		$blog_title=$_POST['blog_title'];
		$blog_author=$_POST['blog_author'];
		$blog_cate_id=$_POST['blog_cate_id'];
		$blog_image=$_FILES['image']['name'];
		$blog_image_temp=$_FILES['image']['tmp_name'];
		$blog_keywords=$_POST['blog_keywords'];
		$blog_content=$_POST['blog_content'];
		$blog_status=$_POST['blog_status'];
		
		move_uploaded_file($blog_image_temp, "../assets/images/$blog_image");
    
    if(empty($blog_image)){
        $query= "SELECT * FROM blogs WHERE blog_id=$the_blog_id";
        $selected_image= mysqli_query($connection,$query);
        
        
        while($row= mysqli_fetch_array($selected_image)){
            $blog_image= $row['blog_image'];
        }
        
    }
		$query= "UPDATE blogs SET blog_title = '{$blog_title}', blog_author = '{$blog_author}',  blog_cate_id = '{$blog_cate_id}', blog_image =  '{$blog_image}', blog_keywords = '{$blog_keywords}', blog_content = '{$blog_content}', blog_status = '{$blog_status}', blog_date = now() WHERE blog_id = {$blog_id}";
    
    	$update_blog= mysqli_query($connection,$query);
	}
?>

   
   
   <form action=""  method="post" enctype="multipart/form-data">
    <div class="from-group mt-2">
        <label for="title">Blog Title</label>
        <input value="<?php echo $blog_title; ?>" type="text" class="form-control" name="blog_title">
    </div>
    <div class="form-group mt-2">
    	<label for="author">Author</label>
       	<input value="<?php echo $blog_author; ?>" type="text" class="form-control" name="blog_author">
     </div>
    <div class="from-group">
       <label for="cate_id">Categories</label><br>
           <select name="blog_cate_id" id="" class="form-control">
             <option>Select Options</option>
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
        <label for="image" >Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="form-group mt-2">
        <img width="100" src="../assets/images/<?php echo $blog_image; ?>" alt="">
    </div>
    <br>
    <div class="from-group mt-2">
        <label for="keyword">KeyWords</label>
        <input value="<?php echo $blog_keywords; ?>" type="text" class="form-control" name="blog_keywords">
    </div>
    <div class="from-group mt-2">
        <label for="contents">Detail</label>
        <textarea name="blog_content" class="form-control" id="" cols="30" rows="10"><?php echo $blog_content; ?></textarea>
    </div>
    <div class="from-group mt-2">
        <label for="status">Fuel Status</label>
        <select name="blog_status" id="" class="form-control" >
            <option >Select Options</option>
            <option value="draft">Draft</option>
            <option value="published">Publish</option>
        </select>
    </div>
    <div class="from-group mt-2">
        <input class="btn btn-primary" type="submit" name="update_blog" value="Update">
    </div>
</form>