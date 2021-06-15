<!-- include header.php -->
<?php include("includes/header.php");?>

<!-- include navbar.php -->
<?php include("includes/navbar.php");?>


<!-- Middle section start -->
<div class="container-fluid  mb-5 mt-4" id="middle-section">
  <div class="row">
    <!-- ================ blog contents ============ -->
    <div class="col-md-8">
    	<h4 class="text-center mt-4">Contact Us</h4>
      <form class="shadow-lg p-4 mb-4 bg-white" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
		  <div class="row">
		    <div class="col-sm pt-2">
		    <label for="">Name</label>
		      <input type="text" class="form-control" id="" placeholder="Name" name="fname">
		    </div>
		    <div class="col-sm pt-2">
		     <label for="">Email</label>
		      <input type="email" class="form-control" placeholder="Email" name="email">
		    </div>
		  </div>
		  <div class="row mt-4">
		  	<div class="col-sm">
		  		<label for="">Massege</label>
		  		<textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>
		    </div>
		  </div>
          <input type="submit" name="submit" class="btn btn-dark mt-4" value="Send Massege">
	 </form>
    </div>

<!-- =======sidebar=========== -->
<?php include('includes/sidebar.php')?>

  </div>
</div>
<!-- include navbar.php -->
<?php include("includes/footer.php");?>

