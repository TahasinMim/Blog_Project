<?php include "includes/db.php"?>
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
                <h4>Recent Posts</h4>
                <h2>Our Recent Blog Entries</h2>
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
				$query_all_blog="SELECT * FROM blogs";
				$all_blogs_shown=mysqli_query($connection,$query_all_blog);
				while($row=mysqli_fetch_assoc($all_blogs_shown)){
				$blog_id=$row['blog_id'];
				$blog_title=$row['blog_title'];
				$blog_image=$row['blog_image'];
				$blog_author=$row['blog_author'];
				$blog_date=$row['blog_date'];
				$blog_content=$row['blog_content'];
				$cont_short=substr($row['blog_content'],0,150);
				$blog_keywords=$row['blog_keywords'];	
				$blog_status=$row['blog_status'];
				$blog_comment=$row['blog_comment'];
				  
				  ?>
                <div class="col-lg-6">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img src="assets/images/<?php echo $blog_image;  ?>" alt="">
                    </div>
                    <div class="down-content">
                      <a href="post-details.php?b_id=<?php echo $blog_id; ?>"><h4><?php echo $blog_title;  ?></h4></a>
                      <ul class="post-info">
                        <li><a href="#"><?php echo $blog_author;  ?></a></li>
                        <li><a href="#"><?php echo $blog_date;  ?></a></li>
                        <li><a href="#"><?php echo $blog_comment;  ?> comments</a></li>
                      </ul>
                      <p><?php echo $cont_short;?></p>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-lg-9">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <li><a href="#"><?php echo $blog_keywords; ?></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php } ?>
              
                <div class="col-lg-12">
                  <ul class="page-numbers">
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                  </ul>
                </div>
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
              <p>Copyright &copy; 2022 || All Rights Reserved</p>
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