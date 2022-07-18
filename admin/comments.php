<?php include "../includes/db.php" ?>
<?php ob_start(); ?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Blog Posts</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>

		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
	        <ul class="list-unstyled components mb-5">
          		<li>
                    <a href="index.php"> Dashboard</a>
                </li>
  			<li>
               <a href="javascript:;" data-toggle="collapse" data-target="#post_dropdown"><i class="fas fa-gas-pump"></i> BLogs<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="post_dropdown" class="collapse">
                 <li>
                  <a href="blogs.php">View All Blogs</a>
                  </li>
                  <li>
                   <a href="blogs.php?source=add_blog">Add Blog</a>
                   </li>
                   </ul>
                </li>
	          <li>
	              <a href="categories.php"> Categories</a>
	          </li>
	          <li class="active">
                  <a href="comments.php"> Comments</a>
              </li>
              <li>
                  <a href="messages.php">Message</a>
              </li>
	          <li>
               <a href="javascript:;" data-toggle="collapse" data-target="#blog_dropdown"> Users<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="blog_dropdown" class="collapse">
                 <li>
                  <a href="user.php">View All Users</a>
                  </li>
                  <li>
                   <a href="user.php?source=add_user"> Add User</a>
                   </li>
                   </ul>
                </li>
	          <li>
               <a href="profile.php">Profile</a>
               </li>
	        
	        </ul>


	      </div>
    	</nav>
    	  <div id="content">

        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li>
                	<a class="nav-link" href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i>Log Out</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        
  <div class="container-fluid">
	   <div class="row">
    	<div class="col-md-12">
                      	  <div class="table-responsive">
                       	  <table class="table table-bordered">
                        	<thead>
                        		<tr>
                        			<th>Id</th>
                        			<th>Author</th>
                        			<th>Email</th>
                        			<th>Comment</th>
                        			<th>Status</th>
                        			<th>Date</th>
                        			<th>In response to</th>
                        			<th>Approve</th>
                        			<th>Unapprove</th>
                        			<th>Delete</th>
                        		</tr>
                        	</thead>
                        	
                       <tbody>
                        <?php
							$query="SELECT * FROM comments";
							$display_comment=mysqli_query($connection,$query);
							while($row=mysqli_fetch_assoc($display_comment)){
								$comment_id=$row['comment_id'];
								$blog_id=$row['blog_id'];
								$comment_name=$row['comment_name'];
								$comment_email=$row['comment_email'];
								$comment_status=$row['comment_status'];
								$comment=$row['comment'];
								$comment_date=$row['comment_date'];
								
								echo "<tr>";
								echo "<td>$comment_id</td>";
								echo "<td>$comment_name</td>";
								echo "<td>$comment_email</td>";
								echo "<td>$comment</td>";
								
//								$query_select_update="SELECT * FROM categories WHERE cat_id='{$post_category_id}' ";
//								$edit_category_table=mysqli_query($connection,$query_select_update);
//								while($row=mysqli_fetch_assoc($edit_category_table)){
//								$cat_id=$row['cat_id'];
//								$cat_title=$row['cat_title'];
//								echo "<td>$cat_title</td>";
//								} 
						
								echo "<td>$comment_status</td>";
								echo "<td>$comment_date</td>";
								$query="SELECT * FROM blogs WHERE blog_id='$blog_id'";
								$display_blog_in_comment_table=mysqli_query($connection,$query);
								while($row=mysqli_fetch_assoc($display_blog_in_comment_table)){
									$blog_id=$row['blog_id'];
									$blog_title=$row['blog_title'];
								
								echo"<td><a href='../post-details.php?b_id=$blog_id'>$blog_title</a></td>";}
								echo "<td><a href=comments.php?approve={$comment_id}>Approve</td>";
								echo "<td><a href=comments.php?unapprove={$comment_id}>Unapprove</td>";
								echo "<td><a href=comments.php?delete={$comment_id}>Delete</td>";
//								echo "<td><a href='posts.php?source=edit_post&p_id={$comment_id}'>Edit</td>";
								echo "</tr>";
							}
									if(isset($_GET['approve'])){
										$the_comment_id=$_GET['approve'];
										$query="UPDATE comments SET comment_status='approved' WHERE comment_id='$the_comment_id'";
										$approve_comment_column=mysqli_query($connection,$query);
										header ("Location:comments.php");
									}
									if(isset($_GET['unapprove'])){
										$the_comment_id=$_GET['unapprove'];
										$query="UPDATE comments SET comment_status='unapproved' WHERE comment_id='$the_comment_id'";
										$unapprove_comment_column=mysqli_query($connection,$query);
										header ("Location:comments.php");
									}
									if(isset($_GET['delete'])){
										$Delete_comment_Id=$_GET['delete'];
										$query="DELETE FROM comments WHERE comment_id='$Delete_comment_Id'";
										$deleting_comment_table=mysqli_query($connection,$query);
										if($deleting_comment_table){
											header ("Location:comments.php");
										}
									}
						?>
                      </tbody>
                   </table>
                   </div>
      </div>
	  </div>
	 </div>
	</div>
   </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
     
  </body>
</html>