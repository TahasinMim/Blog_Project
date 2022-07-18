<?php ob_start(); ?>
  <form action="" method="post"> 
   <table class="table table-bordered">
       
<!--
       <div id="bulkOptionsContainerfuel" class="col-xs-4" style="padding: 0px;">
            <select name="bulkoption" id="" class="form-control" >
                <option value="">Select Options</option>
                <option value="draft">Draft</option>
                <option value="published">Publish</option>
                <option value="delete">Delete</option>
            </select>
       </div>
       <div class="col-xs-4">

           <input type="submit" name="submit" value="Apply" class="btn btn-success">
           <a href="fuels.php?source=add_fuel" class="btn btn-primary">Add New Fuel</a>
       </div>
-->
        <thead>
            <tr>
                
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Date</th>
                <th>Category</th>
                <th>Image</th>
                <th>Contents</th>
                <th>Keywords</th>
                <th>Status</th>
                <th>Comments</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>                                    
<?php
                               
    $query= "SELECT * FROM blogs";
    $view_all_blogs= mysqli_query($connection,$query);
    
    while($row=mysqli_fetch_assoc($view_all_blogs)){
        
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
		$cont_short=substr($row['blog_content'],0,150);
        
        
        ?>
        
        
        <?php
		echo "<tr>";	
        echo "<td>$blog_id</td>";
        echo "<td><a href='../post-details.php?b_id=$blog_id'>$blog_title</a></td>";
        echo "<td>$blog_author</td>";
        echo "<td>$blog_date</td>";
        $query= "SELECT * FROM category WHERE cat_id={$blog_cate_id}";
        $select_category_id= mysqli_query($connection,$query);
                                        
        while($row=mysqli_fetch_assoc($select_category_id)){
            $cat_id=$row['cat_id'];
            $cat_title=$row['cat_title'];
                                        
            echo "<td>$cat_title</td>";
        }
        
        echo "<td><img src='../assets/images/$blog_image' width=250></td>";
        echo "<td>$cont_short</td>";
        echo "<td>$blog_keywords</td>";
        echo "<td>$blog_status</td>";
        echo "<td>$blog_comment</td>";
        echo "<td><a href='blogs.php?source=edit_blog&b_id={$blog_id}'>Edit</a> </td>";
        echo "<td><a href='blogs.php?delete={$blog_id}'>Delete</a> </td>";
        echo "</tr>";
    }
			if(isset($_GET['delete'])){
			$Delete_blog_Id=$_GET['delete'];
			$deleting_blog_query="DELETE FROM blogs WHERE blog_id='$Delete_blog_Id'";
			$deleting_blog_table=mysqli_query($connection,$deleting_blog_query);
			if($deleting_blog_table){
				header ("Location:blogs.php");
					}
			}

			?>                        
        </tbody>
    </table>
</form>