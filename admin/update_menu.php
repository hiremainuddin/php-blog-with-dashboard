<?php
if(isset($_POST['menu_submit']))
{
include 'database/db_connect.php';
$menu_id=$_POST['menu_id'];
$menu_name=$_POST['menu_name'];

$insertqry="UPDATE `menus` SET `menu_name` = '{$menu_name}' WHERE `menus`.`menu_id` = {$menu_id}";
$insertres=mysqli_query($con,$insertqry);
if ($insertres) {
	header("location: menus.php");
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
        <div class="container-fluid bg-white p-4">
         <div class="container  mb-4">
           <h3 class="">Menu Update</h3>
         </div>
<?php
$menuid=$_REQUEST['menuid'];
include 'database/db_connect.php';
$query = "SELECT * FROM menus WHERE menu_id='{$menuid}'";
$result= mysqli_query($con, $query);
$count = mysqli_num_rows($result);
if ($count > 0) {
while($row=mysqli_fetch_assoc($result)){

?>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
				<div class="form-group">
					<input type="hidden" value="<?php echo $row['menu_id']?>" name="menu_id"/>
					<input type="text" name="menu_name"  value="<?php echo $row['menu_name']?>" class="form-control" />
				</div>
				<div class="form-group">
					<input name="menu_submit" class="btn btn-primary" type="submit" value="Update"/>
				</div>
			</form>
<?php }}?>

        </div>
    </div>

</div>  





<!-- footer include -->
<?php include('includes/footer.php');?>