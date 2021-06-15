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
        <div class="container-fluid p-4 bg-white">
         <div class="container mb-4">
           <h4 class="text-center"><i>Menu Add</i></h4>
         </div>
			<form method="post" action="menu_adddb.php">
				<div class="form-group">
					<input type="text" name="menu_name" placeholder="Menu Name" class="form-control" required="" />
				</div>
				<div class="form-group">
					<input name="menu_submit" class="btn btn-primary" type="submit" value="Add Menu"/>
				</div>
			</form>
        </div>
    </div>

</div>  





<!-- footer include -->
<?php include('includes/footer.php');?>