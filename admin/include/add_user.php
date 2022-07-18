<?php
if(isset($_POST['Add_user'])){
    
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $user_role=$_POST['user_role'];
    $username=$_POST['username'];
    
//    $user_image=$_FILES['user_image']['name'];
//    $user_image_temp=$_FILES['user_image']['tmp_name'];
        
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
//    
//    $hashFormat = "$2y$10$"; 
//    $salt = "kaziafrimeahamedaraf71";
//    $hashF_and_salt = $hashFormat . $salt;
//    $user_password = crypt($user_password,$hashF_and_salt);
//    $post_date=date('d-m-y');
//    $post_comment_count=$_POST['post_comment_count'];
//    
//    
//    
//    move_uploaded_file($user_image_temp, "../img/$user_image");
    
    
    $query= "INSERT INTO user(user_firstname, user_lastname, user_role, username, user_email, user_password) VALUES ( '{$user_firstname}', '{$user_lastname}',  '{$user_role}', '{$username}', '{$user_email}', '{$user_password}')";
    
    $create_user_query= mysqli_query($connection,$query);
    echo "<p class='bg-light'>Created: " . " " . " <a href='user.php'>View</a>";
}

     

?>
<form action=""  method="post" enctype="multipart/form-data">
    <div class="from-group">
        <label for="user_name">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="from-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    <div class="from-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    <div class="from-group">
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    <div class="from-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    <div class="from-group">
       <label for="user_role">Role: </label><br>
       <input type="radio" name="user_role" id="" value="Admin">Admin
       <input type="radio" name="user_role" id="" value="Subscriber">Subscriber
    </div>
<!--
    <div class="from-group">
        <input type="file" name="user_image" class="form-control">
    </div>
-->
    <br>
    <div class="from-group">
        <input class="btn btn-primary" type="submit" name="Add_user" value="Add">
    </div>
</form>