<?php
if(isset($_POST['submenu_submit']))
{
include 'database/db_connect.php';
$submenu_id=$_POST['submenu_id'];
$menu_id=$_POST['menu_id'];
$submenu_id=$_POST['submenu_id'];
$submenu_name=$_POST['submenu_name'];


$insertqry="UPDATE `sub_menu` SET `menu_id` = '$menu_id', `submenu_name` = '$submenu_name' WHERE `sub_menu`.`submenu_id` = '$submenu_id'";
$insertres=mysqli_query($con,$insertqry);
if ($insertres) {
	header("location: submenu.php");
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
           <h4 class="text-center"><i>Update sub menu</i></h4>
         </div>

<?php
$sub_menuid= $_GET['submenu_id'];
include 'database/db_connect.php';
$query = "SELECT * FROM sub_menu WHERE submenu_id='{$sub_menuid}'";
$result= mysqli_query($con, $query);
$count = mysqli_num_rows($result);
if ($count > 0) {
while($row=mysqli_fetch_assoc($result)){

?>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
					<input type="hidden" value="<?php echo $row['submenu_id']?>">
				<div class="form-group">
				<select class="form-control" name="menu_id">
					<option value="">Select Menu</option>
					<?php
					include 'database/db_connect.php';
					$menulistqry="SELECT * from menus";
					$menulistres=mysqli_query($con,$menulistqry);
					while ($menu_row = mysqli_fetch_assoc($menulistres)) {
	                if ($menu_row['menu_id'] == $row['menu_id']) {
	                  $selected = "selected";
	                }else{
	                  $selected ="";
	                }
                   echo"<option {$selected} value='{$menu_row['menu_id']}'>{$menu_row['menu_name']}</option>";
					?>
					
				<?php } ?>
				</select>
				</div>
				<div class="form-group">
				  <input type="hidden" name="submenu_id" value="<?php echo $row['submenu_id']?>"/>
				  <input type="text" name="submenu_name" value="<?php echo $row['submenu_name']?>" class="form-control" />
				</div>
				<div class="form-group">
				  <input name="submenu_submit" class="btn btn-primary" type="submit" value="Add Sub Menu"/>
				</div>
				</form>
<?php }}?>
        </div>
    </div>

</div>  





<!-- footer include -->
<?php include('includes/footer.php');?>