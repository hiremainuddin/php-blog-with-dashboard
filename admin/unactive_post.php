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
        <div class="container-fluid">


                <div class="card">
                  <div class="card-body">
                  	<h3>Pandding post</h3>
                    <table class="table table-hover">
                      <thead class="bg-success text-white">
                        <tr>
                          <th> No. </th>
                          <th> Post title </th>
                          <th> Menus </th>
                          <th> Submenu </th>
                          <th> Date </th>
                          <th> Author </th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
            <?php
            include 'database/db_connect.php';
$pagi_limit = 4;
if (isset($_REQUEST['page'])) {
$page_numbar = $_REQUEST['page'];
}else{
$page_numbar = 1;
}
$offset = ($page_numbar -1)* $pagi_limit;
      
$menulistqry="SELECT posts.post_id,posts.post_title,posts.date,posts.author,menus.menu_id,menus.menu_name,sub_menu.submenu_name,users.f_name  from posts left join menus on posts.menu_id=menus.menu_id left join sub_menu on posts.submenu_id=sub_menu.submenu_id left join users on posts.author=users.user_id where post_status='Disable' limit {$offset},{$pagi_limit}";
$menulistres=mysqli_query($con,$menulistqry);
$s_number = 1;
while ($menudata=mysqli_fetch_assoc($menulistres)) {
?>
                        <tr scope="">
                          <td><?php echo $s_number++;?></td>
                          <td><?php echo $menudata['post_title'];?></td>
                          <td><?php echo $menudata['menu_name'];?></td>
                          <td><?php echo $menudata['submenu_name'];?></td>
                          <td><?php echo $menudata['date'];?></td>
                          <td><?php echo $menudata['f_name'];?></td>
                          <td class="text-success">

                            <a href="active_post.php?enable=<?php echo 'Enable';?>&pid=<?php echo $menudata['post_id'];?>" data-toggle="tooltip" data-placement="right" title="Active"><span><i class="fa fa-check-circle" aria-hidden="true"></i></span></a>

                            <a  href="update_post.php?id=<?php echo $menudata['post_id'];?>&mid=<?php echo $menudata['post_id'];?>" data-toggle="tooltip" data-placement="right" title="Update"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></a>

                            <a  onclick="return confirm('Are You Sure?')" href="unactive_delete.php?id=<?php echo $menudata['post_id'];?>&mid=<?php echo $menudata['menu_id'];?>" data-toggle="tooltip" data-placement="right" title="Delete"><span><i class="fa fa-trash-o" aria-hidden="true"></i></span></a>

                          </td>
                        </tr>
            <?php
            }
            ?>           
                      </tbody>
                    </table>
<?php 

$pagi_post  ="SELECT * FROM posts";
$pagi_query =mysqli_query($con, $pagi_post);
$pagi_result=mysqli_num_rows($pagi_query);
if ($pagi_result) {
  $rec_total  = mysqli_num_rows($pagi_query);
  $page_total = ceil($rec_total/$pagi_limit);

     echo"<ul class='pagination justify-content-center'>";
     if ($page_numbar> 1) {
       echo'<li><a class="page-link" href="unactive_post.php?page='.($page_numbar-1).'">Prev</a></li>';
     }
     for ($i=1; $i <= $page_total; $i++) { 
      if ($i== $page_numbar) {
        $active ="active";
      }else{
        $active ="";
      }
      echo'<li  class='.$active.'><a class="page-link" href="unactive_post.php?page='.$i.'">'.$i.'</a></li>';
   }
   if ($page_total> $page_numbar) {
       echo'<li><a class="page-link" href="unactive_post.php?page='.($page_numbar+1).'">Next</a></li>';
     }
  echo"</ul>";
 }
?> 
                  </div>
                </div>



       </div>
    </div>

</div>  




<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<!-- footer include -->
<?php include('includes/footer.php');?>