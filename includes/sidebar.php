    <div class="col-md-4">
      <!-- flowe us -->
  <div class="">
    <div class="rounded border text-center p-2 mb-4 sidhead">অনুসরণ করুন</div>
    
    <div class="row mb-4 p-1">
      <div class="col-sm mb-2"><a href="" class="btn btn-facebook d-block"><span class="pr-2"><i class="fa fa-facebook" aria-hidden="true"></i> </span> facebook</a></div>
      <div class="col-sm mb-2"><a href="" class="btn btn-twitter d-block"><span class="pr-2"><i class="fa fa-twitter" aria-hidden="true"></i></span> Twitter</a></div>
      <div class="col-sm mb-2"><a href="" class="btn btn-linkedin d-block"><span class="pr-2"><i class="fa fa-linkedin" aria-hidden="true"></i></span> LinkedIn</a></div>
    </div>
    
  </div>
<!-- =======Recents post=========== -->
      <div class="">
        <div class="rounded border text-center p-2 mb-4 sidhead">নতুন পোস্ট</div>
          <div class="list-group list-group-flush">
<?php
$side_post ="SELECT posts.post_id, posts.post_title,  posts.post_image, posts.date, posts.menu_id, posts.submenu_id FROM posts LEFT JOIN menus ON posts.menu_id = menus.menu_id LEFT JOIN sub_menu ON posts.submenu_id=sub_menu.submenu_id LEFT JOIN users ON posts.author=users.user_id WHERE post_status='Enable' ORDER BY post_id DESC LIMIT 4";
$side_result=mysqli_query($con,$side_post);
while($side_data=mysqli_fetch_assoc($side_result))
{
?>
            <li class="list-group-item pb-1 pl-0 recents_post">
               <img src="admin/uploads/<?php echo $side_data['post_image'];?>" class="float-left rounded mr-2 img-fluid" width="70"  alt="<?php echo $side_data['post_image'];?>">

              <h6 class="small"><a href="single.php?link=<?php echo $side_data['post_title'];?>&postid=<?php echo $side_data['post_id'];?>&subid=<?php echo $side_data['submenu_id'];?>"><?php echo $side_data['post_title'];?></a></h6>
              
               <div class="small"><?php echo $side_data['date'];?></div>
            </li>
<?php }?>
          </div> 
      </div>

<!-- =======Recents Sub Category=========== -->

          <div class="mt-5">
	          <div class="rounded border text-center p-2 mb-4 sidhead">নতুন সাবকেটাগরি</div>
	          <div class="list-group  list-group-flush category_bc">
<?php
$rc_submenu ="SELECT submenu_id, submenu_name, post_count  FROM sub_menu ORDER BY submenu_id DESC LIMIT 5"; 
$submenu_result=mysqli_query($con,$rc_submenu);
while($submenu_data=mysqli_fetch_assoc($submenu_result))
{
?>
              <li class="list-group-item pb-1 small pl-0">
	             <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> <a href="sub_categoris.php?smlink=<?php echo $submenu_data['submenu_name'];?>&smid=<?php echo $submenu_data['submenu_id'];?>"><?php echo $submenu_data['submenu_name'];?></a>
	             <span class="badge float-right"><?php echo $submenu_data['post_count'];?></span>
	            </li>
<?php }?>
	          </div>
         </div>
    </div>