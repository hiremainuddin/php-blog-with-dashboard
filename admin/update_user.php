<?php

                if (isset($_POST['submit'])) {
                    include('database/db_connect.php');
                    $user_id = mysqli_real_escape_string($con,$_POST['user_id']);
                    $fname   = mysqli_real_escape_string($con,$_POST['f_name']);
                    $username= mysqli_real_escape_string($con,$_POST['username']);
                    $phone   = mysqli_real_escape_string($con,$_POST['phone']);
                    $role    = mysqli_real_escape_string($con,$_POST['role']);
                    

                $query1 ="UPDATE `users` SET `f_name` = '{$fname}', `user_name` = '{$username}', `phone` = '{$phone}', `user_role` = '{$role}' WHERE `users`.`user_id` = '{$user_id}'";
                    $result = mysqli_query($con, $query1) or die("Query filed");
                    if ($result) {
                    header("location: users.php");
                    }


                  }


        ?>
<!-- Top header -->
<?php include('includes/top_header.php');?>

<!--Navbar -->
<?php include('includes/top_navbar.php');?>
<!--/.Navbar -->

<div class="wrapper">
 <!-- Sidebar -->
<?php include('includes/side_navbar.php');?>


    <!-- Page Content -->
    <div id="content" class="jumbotron">
        <div class="container-fluid p-4">



<?php
$get_user_id = $_GET['id'];
include('database/db_connect.php');
$select_user_data  = "SELECT * FROM users WHERE user_id='{$get_user_id}'";
$user_data_result  = mysqli_query($con, $select_user_data);
$user_data_count   = mysqli_num_rows($user_data_result);
if ($user_data_count > 0) {
while ($con_row = mysqli_fetch_assoc($user_data_result)) {   
?> 
            <form class="shadow-lg p-4 mb-4 bg-white" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
			  <div class="row">
			    <div class="col">
			    <label for="">Name</label>
			      <input type="hidden" value="<?php echo $con_row['user_id']?>" name="user_id">
			      <input type="text" class="form-control" value="<?php echo $con_row['f_name']?>" name="f_name">
			    </div>
			    <div class="col">
			     <label for="">User Name</label>
			      <input type="text" class="form-control" value="<?php echo $con_row['user_name']?>" name="username">
			    </div>
			  </div>

			  <div class="row pt-4">
			    <div class="col">
			    <label for="">Mobile Numbar</label>
			      <input type="tel" class="form-control"  value="<?php echo $con_row['phone']?>" name="phone">
			    </div>
			  </div>
			  <div class="row pt-4">
			    <div class="col">
			      <select name="role" id="" class="form-control">
<?php
if ($con_row['user_role'] == 1) {
echo "<option value='1' selected>Admin</option>";
echo "<option value='0'>Moderator</option>";
}else{
echo "<option value='1'>Admin</option>";
echo "<option value='0' selected>Moderator</option>";
}

?>  
			      </select>
			    </div>
			  </div>

              <input type="submit" name="submit" class="btn btn-info mt-4" value="Update">
			</form> 
		<?php }}?>
        </div>
    </div>

</div>  





<!-- footer include -->
<?php include('includes/footer.php');?>