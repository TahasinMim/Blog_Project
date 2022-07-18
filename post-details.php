<?php include "includes/db.php" ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <title>Blog Posts</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
<!--

TemplateMo 551 Stand Blog

https://templatemo.com/tm-551-stand-blog

-->
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <?php include "includes/nav.php"?>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h4>Post Details</h4>
                <h2>Single blog post</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    



    <section class="blog-posts grid-system">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
               <?php 
				  if(isset($_GET['b_id'])){
					  $the_blog_id=$_GET['b_id'];
				  }
				  $query="SELECT * FROM blogs WHERE blog_id='$the_blog_id'";
				  $single_query_connection=mysqli_query($connection,$query);
				  while($row=mysqli_fetch_assoc($single_query_connection)){
					$blog_id=$row['blog_id'];
					$blog_title=$row['blog_title'];
					$blog_image=$row['blog_image'];
					$blog_author=$row['blog_author'];
					$blog_date=$row['blog_date'];
					$blog_content=$row['blog_content'];
					$blog_keywords=$row['blog_keywords'];	
					$blog_comment=$row['blog_comment'];
				  
				  
				  ?>
                <div class="col-lg-12">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img src="assets/images/<?php echo $blog_image;  ?>" alt="">
                    </div>
                    <div class="down-content">
                      <span>Lifestyle</span>
                      <a href="#"><h4><?php echo $blog_title;?></h4></a>
                      <ul class="post-info">
                        <li><a href="#"><?php echo $blog_author;?></a></li>
                        <li><a href="#"><?php echo $blog_date;?></a></li>
                        <li><a href="#"><?php echo $blog_comment;?></a> Comments</li>
                      </ul>
                      <p><?php echo $blog_content;?></p>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-12">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <li><a href="#"><?php echo $blog_keywords;?></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               
                <div class="col-lg-12">
                 
                  <div class="sidebar-item comments">
                    <div class="sidebar-heading">
                      <h2><?php echo $blog_comment; ?> comments</h2>
                    </div>
                    <div class="content">
                     <?php
                        $query="SELECT * FROM comments WHERE blog_id={$the_blog_id} ORDER BY blog_id DESC";
                        $show_all_comment= mysqli_query($connection,$query);
                        if(!$show_all_comment){
                            die("Query Failed". mysqli_error($connection));
                        }
                        while($row=mysqli_fetch_assoc($show_all_comment)){
                            
                            $name=$row['comment_name'];
                            $comment=$row['comment'];
                            $date=$row['comment_date'];
						}
                        ?>
                      <ul>
                        <li>
                         
                          <div class="author-thumb">
                            <img src="assets/images/comment-author-01.jpg" alt="">
                          </div>
                          <div class="right-content">
                            <h4><?php echo $name;?><span><?php echo $date;?></span></h4>
                            <p><?php echo $comment;?></p>
                          </div>
                        </li>
                        
<!--
                        <li class="replied">
                          <div class="author-thumb">
                            <img src="assets/images/comment-author-02.jpg" alt="">
                          </div>
                          <div class="right-content">
                            <h4>Thirteen Man<span>May 20, 2020</span></h4>
                            <p>In porta urna sed venenatis sollicitudin. Praesent urna sem, pulvinar vel mattis eget.</p>
                          </div>
                        </li>
-->
                     <?php { ?>
                      </ul>
                      <?php } ?>
                    </div>
                  </div>
                  
                </div>
                
                <div class="col-lg-12">
                  <div class="sidebar-item submit-comment">
                    <div class="sidebar-heading">
                      <h2>Your comment</h2>
                    </div>
                    
                    <div class="content">
                     	<?php
					  	if(isset($_POST['submit'])){
                
                          	$name= $_POST['comment_name'];
                          	$email= $_POST['comment_email'];
                          	$comment= $_POST['comment'];
                          	$query="INSERT INTO comments(blog_id, comment_name, comment_email, comment, comment_date) VALUES ('$the_blog_id','{$name}','{$email}','{$comment}', now())";
                          	$comment_query_connection= mysqli_query($connection, $query);
					  		 if(!$comment_query_connection){
                                die("Query Failed". mysqli_error($connection));
                            }
					  		$query_count_for_comments= "UPDATE blogs SET blog_comment = blog_comment+1 WHERE blog_id = '$the_blog_id'";
                            $update_comment_count= mysqli_query($connection,$query_count_for_comments);
                            if(!$update_comment_count){
                                    die("Query Failed". mysqli_error($connection));
                            }

                        }
					  
					  	?>
                      <form id="comment" action="" method="post">
                        <div class="row">
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input name="comment_name" type="text" id="name" placeholder="Your name" required="">
                            </fieldset>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input name="comment_email" type="text" id="email" placeholder="Your email" required="">
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <textarea name="comment" rows="6" id="comment" placeholder="Type your comment" required=""></textarea>
                            </fieldset>
                          </div>
<!--
                          <div class="from-group mt-2">
        						<label for="image">Image</label>
        						<input type="file" name="image">
    						</div>
-->
                          <div class="col-lg-12">
                            <fieldset>
                              <button type="submit" name="submit" id="form-submit" class="main-button">Submit</button>
                            </fieldset>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
          
          <div class="col-lg-4">
            <div class="sidebar">
              <div class="row">
                  <div class="col-lg-12">
                    <form id="search_form" method="Post" action="search.php">
                      <div class="input-group mb-3">
    					<input type="text" name="search" class="form-control" placeholder="Search">
    					<div class="input-group-append">
      					<button class="btn btn-warning" name="submit" type="submit">Go</button>  
     					</div>
  					</div>
                    </form>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                      <h2>Recent Posts</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li><a href="post-details.html">
                          <h5>Vestibulum id turpis porttitor sapien facilisis scelerisque</h5>
                          <span>May 31, 2022</span>
                        </a></li>
                        <li><a href="post-details.html">
                          <h5>Suspendisse et metus nec libero ultrices varius eget in risus</h5>
                          <span>May 28, 2022</span>
                        </a></li>
                        <li><a href="post-details.html">
                          <h5>Swag hella echo park leggings, shaman cornhole ethical coloring</h5>
                          <span>May 14, 2022</span>
                        </a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                 <div class="sidebar-item tags">
                    <div class="sidebar-heading">
                      <h2>Categories</h2>
                    </div>
                    <?php 
					  
					  $query_category="SELECT * FROM category";
					  $all_categories_shown=mysqli_query($connection,$query_category);
					  
					  
					  ?>
                    <div class="content">
                      <ul>
                      <?php
                      while($row=mysqli_fetch_assoc($all_categories_shown)){
						  $cat_id=$row['cat_id'];
						  $cat_title=$row['cat_title'];
					  
                     echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>"; } ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <ul class="social-icons">
              <li><a href="#">Facebook</a></li>
              <li><a href="#">Instagram</a></li>
               <li><a href="#">GitHub</a></li>
              <li><a href="#">Linkedin</a></li>
              
            </ul>
          </div>
          <div class="col-lg-12">
            <div class="copyright-text">
              <p> Copyright &copy; 2022 || All Rights Reserved
                    
                </p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
