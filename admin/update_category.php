		<?php 
      	 if(isset($_GET['edit'])){
						$the_cat_id=$_GET['edit'];
						$query_select_update="SELECT * FROM category WHERE cat_id='{$the_cat_id}' ";
						$edit_category_table=mysqli_query($connection,$query_select_update);
						while($row=mysqli_fetch_assoc($edit_category_table)){
							$cat_id=$row['cat_id'];
							$cat_title=$row['cat_title'];}} 
						?>
                   	<?php
							
							if(isset($_POST['update'])){
								$cat_title_update=$_POST['cat_title'];
								$query_update="UPDATE category SET cat_title='{$cat_title_update}' WHERE cat_id='{$the_cat_id}'";
								$update_each_category=mysqli_query($connection,$query_update);
								header("location: categories.php");
							
							 }
							?>	
                   	<form action="" method="post"> 	
                    	<div class="form-group">
                    		<label for="cat_title">Edit Category</label>
                    		<input type="text" class="form-control" name="cat_title" value="<?php if(isset($cat_title)){echo $cat_title;}?>">
                    	</div>
                    	<div class="form-group">
                    		<input type="submit" class="btn btn-primary" name="update" Value="update Category">
                    	</div>
                    </form>