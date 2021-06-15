<?php

                $user_er ="";
                if (isset($_POST['submit'])) {
                    include('database/db_connect.php');
                    $fname= mysqli_real_escape_string($con,$_POST['fname']);
                    $username= mysqli_real_escape_string($con,$_POST['username']);
                    $phone  = mysqli_real_escape_string($con,$_POST['phone']);
                    $password = mysqli_real_escape_string($con,md5($_POST['pswd']));
                    $role = mysqli_real_escape_string($con,$_POST['role']);
                    
                    $query = "SELECT user_name FROM users WHERE user_name='$username'";
                    $result= mysqli_query($con, $query) or die ("Query Filed.");

                    $count = mysqli_num_rows($result);
                    if ($count > 0) {
                     $user_er ="Username Alerday Exists.";
                    }else{
                    $form_data ="INSERT INTO `users` (`f_name`, `user_name`, `user_pwd`, `phone`,`user_role`) VALUES ('$fname', '$username', '$password','$phone','$role')";
                    $from_result = mysqli_query($con, $form_data) or die("Query filed");
                    if ($from_result) {
                    header("location: users.php");
                    }


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

<?php
session_start();
if ($_SESSION['role'] == 0) {
header('location: post.php');
}
?>
    <!-- Page Content -->
    <div id="content" class="jumbotron">
        <div class="container-fluid p-4">
            <form class="shadow-lg p-4 mb-4 bg-white" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
			  <div class="row">
			    <div class="col">
			    <label for="">Name</label>
			      <input type="text" class="form-control" id="" placeholder="Name" name="fname">
			    </div>
			    <div class="col">
			    	<p class="text-danger"><?php echo $user_er?></p>
			     <label for="">User Name</label>
			      <input type="text" class="form-control" placeholder="Username" name="username">
			    </div>
			  </div>

			  <div class="row pt-4">
			    <div class="col">
			    <label for="">Mobile Numbar</label>
			      <input type="tel" class="form-control"  placeholder="Phone" name="phone">
			    </div>
			    <div class="col">
			    	<label for="">Password</label>
			      <input type="password" class="form-control" placeholder="Password" name="pswd">
			    </div>
			  </div>
			  <div class="row pt-4">
			    <div class="col">
			      <select name="role" id="" class="form-control">
			      	<option value="">Select user type</option>
			      	<option value="1">Admin</option>
			      	<option value="0">Moderator</option>
			      </select>
			    </div>
			  </div>

              <input type="submit" name="submit" class="btn btn-info mt-4" value="Add">
			</form> 
        </div>
    </div>

</div>  





<!-- footer include -->
<?php include('includes/footer.php');?>