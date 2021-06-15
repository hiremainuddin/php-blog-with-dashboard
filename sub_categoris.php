<!-- include header.php -->
<?php include("includes/header.php");?>

<!-- include navbar.php -->
<?php include("includes/navbar.php");?>


<!-- Middle section start -->
<div class="container-fluid  mb-5" id="middle-section">
  <div class="container-fluid  pb-4 pt-4">
<?php
$submenu_id = $_REQUEST['smid'];
$submenu_show ="SELECT posts.post_id,  menus.menu_id, menus.menu_name, posts.submenu_id, sub_menu.submenu_name FROM posts LEFT JOIN menus ON posts.menu_id = menus.menu_id  LEFT JOIN sub_menu ON posts.submenu_id = sub_menu.submenu_id  WHERE posts.submenu_id='$submenu_id'";
$submenu_result=mysqli_query($con,$submenu_show);
$submenu_data=mysqli_fetch_assoc($submenu_result);
?>
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="categoris.php?categoris.php?clink=<?php echo $submenu_data['menu_name'];?>&mid=<?php echo $submenu_data['menu_id'];?>"><?php echo $submenu_data['menu_name'];?></a></li>
    <li class="breadcrumb-item active"><a href="sub_categoris.php?smlink=<?php echo $submenu_data['submenu_name'];?>&smid=<?php echo $submenu_data['submenu_id'];?>"><?php echo $submenu_data['submenu_name'];?></a></li>

  </ul>

   </div>
  <div class="row">
    <!-- ================ blog contents ============ -->
    <div class="col-md-8">

<?php
$pagi_limit = 3;
if (isset($_REQUEST['page'])) {
  $page_numbar = $_REQUEST['page'];
}else{
  $page_numbar = 1;
}
$offset = ($page_numbar -1)* $pagi_limit;

$submenu_id = $_REQUEST['smid'];
$sub_post ="SELECT posts.post_id, posts.post_title, posts.post_content, posts.post_image, posts.date, posts.menu_id, posts.submenu_id, posts.author, menus.menu_name, users.f_name FROM posts LEFT JOIN menus ON posts.menu_id = menus.menu_id LEFT JOIN sub_menu ON posts.submenu_id=sub_menu.submenu_id LEFT JOIN users ON posts.author=users.user_id  WHERE posts.submenu_id='{$submenu_id}' LIMIT {$offset},{$pagi_limit}";
$sub_post_result=mysqli_query($con,$sub_post);
while($sub_postdata=mysqli_fetch_assoc($sub_post_result))
{
?>
      <div class="card-body mb-2">
        <img src="admin/uploads/<?php echo $sub_postdata['post_image'];?>" class="float-left mr-4" width="350" alt="<?php echo $post_data['post_image'];?>">

        <h4>
          <a href="single.php?link=<?php echo $sub_postdata['post_title'];?>&postid=<?php echo $sub_postdata['post_id'];?>&subid=<?php echo $sub_postdata['submenu_id'];?>"><?php echo $sub_postdata['post_title'];?></a>
        </h4>

        <div class="small">
                <a href="">By <?php echo $sub_postdata['f_name'];?></span></a>
                <a href="categoris.php?clink=<?php echo $sub_postdata['menu_name'];?>&mid=<?php echo $sub_postdata['menu_id'];?>"><span><i class="fa fa-align-left" aria-hidden="true"></i> <?php echo $sub_postdata['menu_name'];?></span></a>
                <a href=""><span><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $sub_postdata['date'];?></span></a>
        </div>

        <p>
                  <?php echo substr($sub_postdata['post_content'], 0, 280)."...";?>
        </p>

        <a href="single.php?link=<?php echo $sub_postdata['post_title'];?>&postid=<?php echo $sub_postdata['post_id'];?>&subid=<?php echo $sub_postdata['submenu_id'];?>" class="btn btn-dark mt-2"><b>READ MORE <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></b></a>
        
      </div>
<?php }?>

         <div class="container pt-4">
<?php 

$pagi_post  ="SELECT * FROM posts WHERE posts.submenu_id='{$submenu_id}'";
$pagi_query =mysqli_query($con, $pagi_post);
$pagi_result=mysqli_num_rows($pagi_query);
if ($pagi_result) {
  $rec_total  = mysqli_num_rows($pagi_query);
  $page_total = ceil($rec_total/$pagi_limit);

     echo"<ul class='pagination justify-content-center'>";
     if ($page_numbar> 1) {
       echo'<li class="page-item"><a class="page-link" href="sub_categoris.php?='.$submenu_id.'&page='.($page_numbar-1).'">Prev</a></li>';
     }
     for ($i=1; $i <= $page_total; $i++) { 
      if ($i== $page_numbar) {
        $active ="active";
      }else{
        $active ="";
      }

      echo'<li class="page-item"><a class="page-link" href="sub_categoris.php?='.$submenu_id.'&page='.$i.'">'.$i.'</a></li>';
   }

   if ($page_total> $page_numbar) {
       echo'<li class="page-item"><a class="page-link" href="sub_categoris.php?='.$submenu_id.'&page='.($page_numbar+1).'">Next</a></li>';
     }
  echo"</ul>";
 }
?> 
          </div>
    </div>

<!-- =======sidebar=========== -->
<?php include('includes/sidebar.php')?>

  </div>
</div>
<!-- include navbar.php -->
<?php include("includes/footer.php");?>

