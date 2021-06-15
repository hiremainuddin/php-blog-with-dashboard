<!-- include header.php -->
<?php include("includes/header.php");?>

<!-- include navbar.php -->
<?php include("includes/navbar.php");?>
<!-- Home section Design -->

<div class="container-fluid text-center text-white" id="section_home">
 <div class="container">
  <h2> আপনার পছন্দমত অনুসন্ধান করুন </h2>
    <div class="search_div">
        <form class="example" action="search.php" method="get">
          <input type="text" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
  </div>
 </div>
</div>



<!-- Middle section start -->
<div class="container-fluid mt-5 mb-5" id="middle-section">
  <div class="row">

    <!-- ================ blog contents ============ -->
    <div class="col-md-8">
<?php
$pagi_limit = 2;
if (isset($_REQUEST['page'])) {
  $page_numbar = $_REQUEST['page'];
}else{
  $page_numbar = 1;
}
$offset = ($page_numbar -1)* $pagi_limit;


$post_show ="SELECT posts.post_id, posts.post_title, posts.post_content, posts.post_image, posts.date, posts.menu_id, posts.submenu_id, posts.author, menus.menu_name, sub_menu.submenu_id, sub_menu.submenu_name, users.user_id, users.f_name FROM posts LEFT JOIN menus ON posts.menu_id = menus.menu_id LEFT JOIN sub_menu ON posts.submenu_id=sub_menu.submenu_id LEFT JOIN users ON posts.author=users.user_id  WHERE post_status='Enable' limit {$offset},{$pagi_limit}";
$post_result=mysqli_query($con,$post_show);
while($post_data=mysqli_fetch_assoc($post_result))
{
?>
      <div class="card-body mb-2">
        <div class="p-img">
          <img src="admin/uploads/<?php echo $post_data['post_image'];?>" class="float-left img-fluid mr-4 mb-2 rounded" width="350" height="200" alt="Post Iamge">
        </div>

        <h4>
          <a href="single.php?title=<?php echo $post_data['post_title'];?>&postid=<?php echo $post_data['post_id'];?>&subid=<?php echo $post_data['submenu_id'];?>">
          <?php echo $post_data['post_title'];?></a>
        </h4>

        <div class="small">
                <a href="author.php?name=<?php echo $post_data['f_name'];?>&aid=<?php echo $post_data['user_id'];?>">By <?php echo $post_data['f_name'];?></span></a>
                <a href="categoris.php?mid=<?php echo $post_data['menu_id'];?>"><span><i class="fa fa-align-left" aria-hidden="true"></i> <?php echo $post_data['menu_name'];?></span></a>
                <a href=""><span><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $post_data['date'];?></span></a>
        </div>

        <p><?php echo substr($post_data['post_content'], 0, 280)."...";?></p>

        <a href="single.php?title=<?php echo $post_data['post_title'];?>&postid=<?php echo $post_data['post_id'];?>&subid=<?php echo $post_data['submenu_id'];?>" class="btn btn-dark mt-1"><b>আরো পরুন <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></b></small></a>
        
      </div>
<?php }?>
         <div class="container pt-4">
<?php 

$pagi_post  ="SELECT * FROM posts";
$pagi_query =mysqli_query($con, $pagi_post);
$pagi_result=mysqli_num_rows($pagi_query);
if ($pagi_result) {
  $rec_total  = mysqli_num_rows($pagi_query);
  $page_total = ceil($rec_total/$pagi_limit);

     echo"<ul class='pagination justify-content-center mb-5'>";
     if ($page_numbar> 1) {
       echo'<li><a class="page-link" href="index.php?page='.($page_numbar-1).'">Prev</a></li>';
     }
     for ($i=1; $i <= $page_total; $i++) { 
      if ($i== $page_numbar) {
        $active ="active";
      }else{
        $active ="";
      }
      echo'<li  class='.$active.'><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
   }
   if ($page_total> $page_numbar) {
       echo'<li><a class="page-link" href="index.php?page='.($page_numbar+1).'">Next</a></li>';
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