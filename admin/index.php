<?php include('database/db_connect.php');
$error ="";
if (isset($_POST['login'])){
$user_name = mysqli_real_escape_string($con,$_POST['user']);
$password  = mysqli_real_escape_string($con,md5($_POST['pass']));

$login_date = "SELECT user_id, user_name, user_role FROM users WHERE user_name='$user_name' AND user_pwd='$password'";
$login_sql  = mysqli_query($con, $login_date) or die('Query Failed');

if (mysqli_num_rows($login_sql) > 0) {
while ($db_row = mysqli_fetch_assoc($login_sql)) {
session_start();
$_SESSION['user_name'] = $db_row['user_name'];
$_SESSION['user_id'] = $db_row['user_id'];
$_SESSION['role'] = $db_row['user_role'];
header("location: dashboard.php");
}
}else{
$error ="<small>Username Or Password is Wrong !</small>";
}
}

?>
<!-- Top header -->
<?php include('includes/top_header.php');?>
<div class="wrapper">
    <!-- Page Content -->
    <div id="content" class="p-4">
        <div class="container-fluid d-flex justify-content-center p-4">

			  <div class="card bg-light mt-5" style="width:380px">
                <div class="card-header">Login Dashboard</div>
			    <div class="card-body">
			    	 <strong style="color: red"><?php echo  $error?></strong>
				  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
					  <div class="form-group">
					    <input type="text" class="form-control" name="user" placeholder="Enter username" id="user">
					  </div>
					  <div class="form-group">
					    <input type="password" class="form-control" name="pass" placeholder="Enter password" id="pwd">
					  </div>
					  <button type="submit" name="login" class="btn btn-info">Login</button>
					</form> 
			    </div>
			  </div>

        </div>
    </div>

</div>  



<!-- footer include -->
<?php include('includes/footer.php');?>