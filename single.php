<!-- include header.php -->
<?php include("includes/header.php");?>

<!-- include navbar.php -->
<?php include("includes/navbar.php");?>


<!-- Middle section start -->
<div class="container-fluid  mb-5" id="middle-section">
  <div class="container-fluid pb-4 pt-4">

    <div class="">
<?php
$get_id =$_GET['postid'];
$menu_show ="SELECT posts.post_id, posts.post_title, posts.post_content, posts.post_image, posts.date, posts.menu_id, posts.submenu_id, posts.author, menus.menu_name, sub_menu.submenu_name, users.user_id, users.f_name FROM posts LEFT JOIN menus ON posts.menu_id = menus.menu_id LEFT JOIN sub_menu ON posts.submenu_id=sub_menu.submenu_id LEFT JOIN users ON posts.author=users.user_id  WHERE post_id='$get_id'";
$menu_result=mysqli_query($con,$menu_show);
while($menu_data=mysqli_fetch_assoc($menu_result))
{
?>

  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="categoris.php?categoris.php?clink=<?php echo $menu_data['menu_name'];?>&mid=<?php echo $menu_data['menu_id'];?>"><?php echo $menu_data['menu_name'];?></a></li>
    <li class="breadcrumb-item"><a href="sub_categoris.php?smlink=<?php echo $menu_data['submenu_name'];?>&smid=<?php echo $menu_data['submenu_id'];?>"><?php echo $menu_data['submenu_name'];?></a></li>
    <li class="breadcrumb-item active"><?php echo $menu_data['post_title'];?></li>
  </ul>

<?php }?>

    </div>



  </div>
  <div class="row">
    <!-- ================ blog contents ============ -->
    <div class="col-md-8">
    	<div class="card p-4">
<?php
$get_id =$_GET['postid'];
$post_show ="SELECT posts.post_id, posts.post_title, posts.post_content, posts.post_image, posts.date, posts.menu_id, posts.submenu_id, posts.author, menus.menu_name, sub_menu.submenu_name, users.user_id, users.f_name FROM posts LEFT JOIN menus ON posts.menu_id = menus.menu_id LEFT JOIN sub_menu ON posts.submenu_id=sub_menu.submenu_id LEFT JOIN users ON posts.author=users.user_id  WHERE post_id='$get_id'";
$post_result=mysqli_query($con,$post_show);
while($post_data=mysqli_fetch_assoc($post_result))
{
?>
          <h3><?php echo $post_data['post_title'];?></h3>
        <div class="small">
                <a href="author.php?name=<?php echo $post_data['f_name'];?>&aid=<?php echo $post_data['user_id'];?>">By <?php echo $post_data['f_name'];?></span></a>
                <a href="categoris.php?mid=<?php echo $post_data['menu_id'];?>"><span><i class="fa fa-bars" aria-hidden="true"></i> <?php echo $post_data['menu_name'];?></span></a>
                <a href=""><span><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $post_data['date'];?></span></a>
        </div>
          <img src="admin/uploads/<?php echo $post_data['post_image'];?>" alt="<?php echo $post_data['post_image'];?>" class="rounded img-fluid mt-4" width="400">

          <p class="mt-4"><?php echo $post_data['post_content'];?></p>

          <div class="mt-5">
          	<strong class="btn">Tag</strong>
<?php
$old_menu ="SELECT * FROM  menus   ORDER BY menu_id ASC";
$menu_result=mysqli_query($con,$old_menu);
while($menu_data=mysqli_fetch_assoc($menu_result))
{
 ?>
          	<a href="categoris.php?categoris.php?clink=<?php echo $menu_data['menu_name'];?>&mid=<?php echo $menu_data['menu_id'];?>" class="btn btn-light"><?php echo $menu_data['menu_name'];?></a>
<?php }?>
          </div>

<?php }?>
 
          	<div class="like-border mt-5 mb-4 pb-1"><small class="p-2 text-white">You like this posts</small></div>
         	<div class="row">

<?php
$sub_id = $_REQUEST['subid'];
$sub_post ="SELECT posts.post_id, posts.post_title,  posts.post_image, posts.date, posts.menu_id, posts.submenu_id, posts.author, menus.menu_name, users.f_name FROM posts LEFT JOIN menus ON posts.menu_id = menus.menu_id LEFT JOIN sub_menu ON posts.submenu_id=sub_menu.submenu_id LEFT JOIN users ON posts.author=users.user_id  WHERE posts.submenu_id='{$sub_id}' LIMIT 3";
$sub_post_result=mysqli_query($con,$sub_post);
while($sub_postdata=mysqli_fetch_assoc($sub_post_result))
{
?>

          		<div class="col-md-4">
              <div class="card mb-4">
                <img src="admin/uploads/<?php echo $sub_postdata['post_image'];?>" class="img-fluid mb-2" alt="<?php echo $post_data['post_image'];?>">
                 <div class="p-2">

                  <h6>
                    <a href="single.php?title=<?php echo $sub_postdata['post_title'];?>&postid=<?php echo $sub_postdata['post_id'];?>&subid=<?php echo $sub_postdata['submenu_id'];?>" class="text-dark"><?php echo $sub_postdata['post_title'];?></a>
                  </h6>
                  
                  <div class="small">
                    <a href="">By <?php echo $sub_postdata['f_name'];?></span></a>
                    <a href=""><span><i class="fa fa-bars" aria-hidden="true"></i> <?php echo $sub_postdata['menu_name'];?></span></a>
                    <a href=""><span><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $sub_postdata['date'];?></span></a>
                  </div>
                   <a href="single.php?title=<?php echo $sub_postdata['post_title'];?>&postid=<?php echo $sub_postdata['post_id'];?>&subid=<?php echo $sub_postdata['submenu_id'];?>" class="btn btn-dark d-block mt-2"><small>READ MORE</small></a>
                 </div>
                </div>
          		</div>
<?php }?>

            </div>
            <!-- row end -->
          </div>
      <!-- </div> -->
    </div>

<!-- =======sidebar=========== -->
<?php include('includes/sidebar.php')?>

  </div>
</div>
<!-- include navbar.php -->
<?php include("includes/footer.php");?>

