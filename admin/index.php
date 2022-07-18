<?php include "../includes/db.php" ?>
<?php 
session_start(); 
?>
<?php

     if(!isset($_SESSION['user_role'])){
            header("Location: ../index.php");
        
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
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
  <style>
	
	  .box{
		  background: whitesmoke;
		  padding:25px;
		  margin-left: 25px;
	  }
	
	
	
	</style>
  <body>

		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
	        <ul class="list-unstyled components mb-5">
          		<li class="active">
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
	          <li>
               <a href="profile.php">Profile</a>
               </li>
	        
	        </ul>


	      </div>
    	</nav>

        <!-- Page Content  -->
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
                    <a class="nav-link" href="../index.php"><?php echo $_SESSION['username'];?></a>
                </li>
                <li>
                	<a class="nav-link" href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i>Log Out</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
   <div class="row">
    	<div class="col-md-5 box">
        <div class="panel primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-3">
                        <i class="fa fa-file-text fa-5x"> </i>
                    </div>
                    <div class="col-md-9 text-right">
                    <?php  
						$query="SELECT * FROM blogs";
						$show_all_blogs=mysqli_query($connection,$query);
						$post_count=mysqli_num_rows($show_all_blogs);
						
						echo "<div class='huge'>$post_count</div>";
						?>
                  
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="blogs.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>


    <div class="col-lg-5 box">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-md-9 text-right">
                     <?php  
						$query="SELECT * FROM comments";
						$show_all_comments=mysqli_query($connection,$query);
						$comment_count=mysqli_num_rows($show_all_comments);
						
						echo "<div class='huge'>$comment_count</div>";
						?>
                     
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-5 box">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-md-9 text-right">
                        <?php  
						$query="SELECT * FROM user";
						$show_all_users=mysqli_query($connection,$query);
						$user_count=mysqli_num_rows($show_all_users);
						
						echo "<div class='huge'>$user_count</div>";
						?>
                   
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="user.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-5 box">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-md-9 text-right">
                         <?php  
						$query="SELECT * FROM category";
						$show_all_categories=mysqli_query($connection,$query);
						$category_count=mysqli_num_rows($show_all_categories);
						
						echo "<div class='huge'>$category_count</div>";
						?>
                        
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        			</div>
    			</div>
	   </div>
	   <br>
	   <div class="row">	
    	<div class="col-lg-5 box">
        	<div class="panel panel-red">
            	<div class="panel-heading">
                	<div class="row">
                    <div class="col-md-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-md-9 text-right">
                         <?php  
						$query="SELECT * FROM messages";
						$show_all_messages=mysqli_query($connection,$query);
						$message_count=mysqli_num_rows($show_all_messages);
						
						echo "<div class='huge'>$message_count</div>";
						?>
                        
                         <div>Messsages</div>
                    </div>
                </div>
            </div>
            <a href="messages.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        			</div>
    			</div>
			</div>

               <?php 
			$query="SELECT * FROM blogs WHERE blog_status='published' ";
			$show_all_published_posts=mysqli_query($connection,$query);
			$published_post_count=mysqli_num_rows($show_all_published_posts);	
				
			$query="SELECT * FROM blogs WHERE blog_status='draft' ";
		  	$show_all_draft_posts=mysqli_query($connection,$query);
			$draft_post_count=mysqli_num_rows($show_all_draft_posts);		
				
				
				
	?>      
    <br><br>              
                   <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">View Statistics</h3>
                            <div >
                              <canvas class="flot-base w-100" style="height:40vh;" height="200px" id="myChart"></canvas>
                            </div>
                                <script>
                                const ctx = document.getElementById('myChart').getContext('2d');
                                const myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: ['All Blogs', 'Comments', 'Messages','Published','Pending', 'Users', 'Category'],
                                        datasets: [{
                                            label: 'Counts',
                                            data: [<?php echo $post_count ?>, <?php echo $comment_count ?>, <?php echo $message_count ?>, <?php echo $published_post_count ?>,<?php echo $draft_post_count ?>,<?php echo $user_count ?>, <?php echo $category_count ?>],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                                </script>
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