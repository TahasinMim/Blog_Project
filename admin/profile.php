<?php include "../includes/db.php" ?>
<?php session_start(); ?>
<?php 
	if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
		
        $query= "SELECT * FROM user WHERE username = '{$username}'";
        $select_profile= mysqli_query($connection,$query);
        
        while($row=mysqli_fetch_array($select_profile)){
        
            $user_id=$row['user_id'];  
            $username=$row['username'];
            $user_password=$row['user_password'];
            $user_firstname=$row['user_firstname'];
            $user_lastname=$row['user_lastname'];
            $user_email=$row['user_email'];
            $user_role=$row['user_role'];
        }}
?>
   
<?php

if(isset($_POST['edit'])){
    
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $user_role=$_POST['user_role'];
    $username=$_POST['username'];   
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];

    
    $query= "UPDATE user SET user_firstname = '{$user_firstname}', user_lastname = '{$user_lastname}', user_role= '{$user_role}', username = '{$username}', user_email =  '{$user_email}', user_password = '{$user_password}' WHERE username = '{$username}'";
    
    $update_users= mysqli_query($connection,$query);
}

?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Blog Posts</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
	          <li>
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
	          <li  class="active">
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
    	<div class="col-lg-12">
    	
    	
    	 <form action=""  method="post" enctype="multipart/form-data">
                           
                            <div class="from-group">
                                <label for="user_firstname">First Name</label>
                                <input value="<?php echo $user_firstname; ?> " type="text" class="form-control" name="user_firstname">
                            </div>
                            <div class="from-group">
                                <label for="user_lastname">Last Name</label>
                                <input value="<?php echo $user_lastname; ?> " type="text" class="form-control" name="user_lastname">
                            </div>
                            <div class="from-group">
                               <label for="user_role">Role: </label><br>
                               <input  type="radio" name="user_role" id="" value="Admin">Admin
                               <input  type="radio" name="user_role" id="" value="Subscriber">Subscriber


                            </div>
                            <div class="from-group">
                                <label for="user_name">Username</label>
                                <input value="<?php echo $username; ?> " type="text" class="form-control" name="username">
                            </div>
                            <div class="from-group">
                                <label for="user_email">Email</label>
                                <input value="<?php echo $user_email; ?> "  type="email" class="form-control" name="user_email">
                            </div>
                            <div class="from-group">
                                <label for="user_password">Password</label>
                                <input value="<?php echo $user_password; ?> " type="password" class="form-control" name="user_password">
                            </div>
                            <br>
                            <div class="from-group">
                                <input class="btn btn-primary" type="submit" name="edit" value="Update">
                            </div>
                        </form>

		
		
		
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