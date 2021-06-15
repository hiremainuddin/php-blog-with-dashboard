
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
        	<h3 class="text-center">All user</h3>
			<a href="user_add.php" class="btn btn-success float-right mb-2">Add user</a>
			<table class="table table-hover text-center">
				<thead class="bg-success text-white">
					<tr>
						<th>S.No</th>
						<th>Full Name</th>
						<th>User Name</th>
						<th>User Number</th>
						<th>Role</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
<?php
include 'database/db_connect.php';


$pagi_limit = 3;
if (isset($_REQUEST['page'])) {
  $page_numbar = $_REQUEST['page'];
}else{
  $page_numbar = 1;
}
$offset = ($page_numbar -1)* $pagi_limit;

$menulistqry="SELECT * from users where user_id limit {$offset},{$pagi_limit}";
$menulistres=mysqli_query($con,$menulistqry);
$user_count =1;
while ($menudata=mysqli_fetch_assoc($menulistres)) {
?>
<tr>
<td><?php echo $user_count++?></td>
<td><?php echo $menudata['f_name'];?></td>
<td><?php echo $menudata['user_name'];?></td>
<td><?php echo $menudata['phone'];?></td>
<td>
<?php if ($menudata['user_role'] == 1){
echo "Admin";
}else{
echo "Moderator";
} ?>
							
							</td>
							<td>
								<a class="btn btn-success" href="update_user.php?id=<?php echo $menudata['user_id']?>">Update</a>
				                <a class="btn btn-danger float-right" href="delete_user.php?id=<?php echo $menudata['user_id']?>">Delete</a>
							</td>
							</tr>
						<?php
						}
						?>
					
				</tbody>
			</table>

			<?php 

$pagi_post  ="SELECT * FROM users";
$pagi_query =mysqli_query($con, $pagi_post);
$pagi_result=mysqli_num_rows($pagi_query);
if ($pagi_result) {
  $rec_total  = mysqli_num_rows($pagi_query);
  $page_total = ceil($rec_total/$pagi_limit);

     echo"<ul class='pagination justify-content-center'>";
     if ($page_numbar> 1) {
       echo'<li><a class="page-link" href="users.php?page='.($page_numbar-1).'">Prev</a></li>';
     }
     for ($i=1; $i <= $page_total; $i++) { 
      if ($i== $page_numbar) {
        $active ="active";
      }else{
        $active ="";
      }
      echo'<li  class='.$active.'><a class="page-link" href="users.php?page='.$i.'">'.$i.'</a></li>';
   }
   if ($page_total> $page_numbar) {
       echo'<li><a class="page-link" href="users.php?page='.($page_numbar+1).'">Next</a></li>';
     }
  echo"</ul>";
 }
?> 
        </div>
    </div>

</div>  





<!-- footer include -->
<?php include('includes/footer.php');?>
