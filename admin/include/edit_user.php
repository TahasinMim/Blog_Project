<?php
if(isset($_GET['b_id'])){
    $the_user_id= $_GET['b_id'];
    
    $query= "select * from user WHERE user_id=$the_user_id";
    $update_edt_user= mysqli_query($connection,$query);
    
    while($row=mysqli_fetch_assoc($update_edt_user)){
        
        $user_id=$row['user_id'];  
        $username=$row['username'];
        $user_password=$row['user_password'];
        $user_firstname=$row['user_firstname'];
        $user_lastname=$row['user_lastname'];
        $user_email=$row['user_email'];
        $user_role=$row['user_role'];
    
    }
    
}
if(isset($_POST['edit'])){
    
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $user_role=$_POST['user_role'];
    $username=$_POST['username'];    
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];

    $query= "UPDATE user SET user_firstname = '{$user_firstname}', user_lastname = '{$user_lastname}', user_role= '{$user_role}', username = '{$username}', user_email =  '{$user_email}', user_password = '{$user_password}' WHERE user_id = {$the_user_id}";
    
    $update_users= mysqli_query($connection,$query);
    
     echo "<p class='bg-light'>Updated: " . " " . " <a href='user.php'>View</a>";
}

     

?>
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