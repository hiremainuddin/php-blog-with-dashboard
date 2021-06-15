<!-- Top header -->
<?php include('includes/top_header.php');?>

<!--Navbar -->
<?php include('includes/top_navbar.php');?>
<!--/.Navbar -->

<div class="wrapper">
 <!-- Sidebar -->
<?php include('includes/side_navbar.php');?>
<?php
if ($_SESSION['role'] == 0) {
header('location: post.php');
}
?>

    <!-- Page Content -->
    <div id="content" class="jumbotron">
        <div class="container-fluid bg-white p-4">
         <div class="container mb-4">
          <h3 class="">Menus</h3>
           <strong><a href="menu_add.php" class="text-success float-right">Menu Add</a></strong>
         </div>

			<table class="table table-hover text-center">
				<thead class="bg-success text-white">
					<tr>
						<th>S.No</th>
						<th>Menu Name</th>
						<th>Total post</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
<?php
$pagi_limit = 3;
if (isset($_REQUEST['page'])) {
  $page_numbar = $_REQUEST['page'];
}else{
  $page_numbar = 1;
}
$offset = ($page_numbar -1)* $pagi_limit;

include 'database/db_connect.php';
$menulistqry="SELECT * from menus where menu_id limit {$offset},{$pagi_limit}";
$menulistres=mysqli_query($con,$menulistqry);
$ser = 1;
while ($menudata=mysqli_fetch_assoc($menulistres)) {
?>
						<tr>
							<td><?php echo $ser++;?></td>
							<td><?php echo $menudata['menu_name'];?></td>
							<td><?php echo $menudata['post_count'];?></td>
							<td>
								<a class="btn btn-primary" href="update_menu.php?menuid=<?php echo $menudata['menu_id']?>"><i class="fa fa-edit"></i> Update</a>
				                <a class="btn btn-danger" href="delete_menu.php?id=<?php echo $menudata['menu_id']?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
							</td>
							</tr>
						<?php
						}
						?>
					
				</tbody>
			</table>
<?php 

$pagi_post  ="SELECT * FROM menus";
$pagi_query =mysqli_query($con, $pagi_post);
$pagi_result=mysqli_num_rows($pagi_query);
if ($pagi_result) {
  $rec_total  = mysqli_num_rows($pagi_query);
  $page_total = ceil($rec_total/$pagi_limit);

     echo"<ul class='pagination justify-content-center'>";
     if ($page_numbar> 1) {
       echo'<li><a class="page-link" href="menus.php?page='.($page_numbar-1).'">Prev</a></li>';
     }
     for ($i=1; $i <= $page_total; $i++) { 
      if ($i== $page_numbar) {
        $active ="active";
      }else{
        $active ="";
      }
      echo'<li  class='.$active.'><a class="page-link" href="menus.php?page='.$i.'">'.$i.'</a></li>';
   }
   if ($page_total> $page_numbar) {
       echo'<li><a class="page-link" href="menus.php?page='.($page_numbar+1).'">Next</a></li>';
     }
  echo"</ul>";
 }
?> 
        </div>
    </div>

</div>  





<!-- footer include -->
<?php include('includes/footer.php');?>