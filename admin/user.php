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
	          <li  class="active">
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
    	<div class="col-lg-12">
     	<?php
    
    	if(isset($_GET['source'])){
        
        $source=$_GET['source'];
        
    	}
		   else {
    	$source='';
		   }
		   switch($source){
        
        	case 'add_user';
        	include "include/add_user.php";
        	break;
        
        	case 'edit_user';
        	include "include/edit_user.php";
        	break;

    		default:
        
        	include "include/view_all_users.php";
            
        	break;
        
		   }?>
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