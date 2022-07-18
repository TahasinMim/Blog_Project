<?php ob_start();?>  
                           <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>UserName</th>
                                    <th>Email</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Role</th>
                                    <th>Admin</th>
                                    <th>Subscriber</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                           
                           
                            
<?php
                               
                            
    $query= "SELECT * FROM user";
    $select_user= mysqli_query($connection,$query);
    
    while($row=mysqli_fetch_assoc($select_user)){
        
        $user_id=$row['user_id'];  
        $username=$row['username'];
        $user_password=$row['user_password'];
        $user_firstname=$row['user_firstname'];
        $user_lastname=$row['user_lastname'];
        $user_email=$row['user_email'];
        $user_role=$row['user_role'];
        
        
        echo "<tr>";
        echo "<td>$user_id</td>";
        echo "<td>$username</td>";
		echo "<td>$user_email</td>";
        echo "<td>$user_firstname</td>";
        echo "<td>$user_lastname</td>"; 
        echo "<td>$user_role</td>";
        echo "<td><a href='user.php?Admin={$user_id}'>Admin</a> </td>";
        echo "<td><a href='user.php?Subscriber={$user_id}'>Subscriber</a> </td>";
        echo "<td><a href='user.php?source=edit_user&b_id={$user_id}'>Edit</a></td>";
        echo "<td><a href='user.php?delete={$user_id}'>Delete</a></td>";
        echo "</tr>";
    }
 ?>
		 </tbody>
        </table>
<?php


if(isset($_GET['Admin'])){
    $the_user_id=$_GET['Admin'];
    
    $query="UPDATE user SET user_role='Admin' WHERE user_id= {$the_user_id} ";
    $change_to_admin_query= mysqli_query($connection,$query);
    header("Location:user.php");
}

if(isset($_GET['Subscriber'])){
    $the_user_id=$_GET['Subscriber'];
    
    $query="UPDATE user SET user_role='Subscriber' WHERE user_id= {$the_user_id} ";
    $change_to_subscriber_query= mysqli_query($connection,$query);
    header("Location:user.php");
}



if(isset($_GET['delete'])){
    $the_user_id=$_GET['delete'];
    
    $query="DELETE FROM user WHERE user_id= {$the_user_id}";
    $delete_query= mysqli_query($connection,$query);
    header("Location:user.php");
}
                          
?>