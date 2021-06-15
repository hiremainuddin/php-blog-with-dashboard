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
        <div class="container-fluid bg-white  p-4">
         <div class="container p-4 mb-4">
           <h4 class="text-center white"><i>Sub menu add</i></h4>
         </div>
				<form method="post" action="submenu_adddb.php">
				<div class="form-group">
				<select class="form-control" name="menu_id">
					<option value="">Select Menu</option>
					<?php
					include 'database/db_connect.php';
					$menulistqry="SELECT * from menus where menu_id";
					$menulistres=mysqli_query($con,$menulistqry);
					while ($menudata=mysqli_fetch_assoc($menulistres)) {
					?>
					<option value="<?php echo $menudata['menu_id'];?>"><?php echo $menudata['menu_name'];?></option>
				<?php } ?>
				</select>
				</div>
				<div class="form-group">
				  <input type="text" name="submenu_name" placeholder="Sub Menu Name" class="form-control" required="" />
				</div>
				<div class="form-group">
				  <input name="submenu_submit" class="btn btn-primary" type="submit" value="Add Sub Menu"/>
				</div>
				</form>
        </div>
    </div>

</div>  





<!-- footer include -->
<?php include('includes/footer.php');?>