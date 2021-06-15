<footer >
  <div class="container-fluid pt-5 pb-5 text-white" id="footer">
    <div class="row">
      <div class="col-md-4 pb-4">
        <h5 class="pl-1">নতুন পোস্ট</h5>
          <div class="list-group list-group-flush">
<?php
$rec_post ="SELECT posts.post_id, posts.post_title,  posts.post_image, posts.date, posts.menu_id, posts.submenu_id FROM posts LEFT JOIN menus ON posts.menu_id = menus.menu_id LEFT JOIN sub_menu ON posts.submenu_id=sub_menu.submenu_id LEFT JOIN users ON posts.author=users.user_id WHERE post_status='Enable' ORDER BY post_id DESC LIMIT 3";
$rec_result=mysqli_query($con,$rec_post);
while($rec_data=mysqli_fetch_assoc($rec_result))
{
 ?>

            <li class="list-group-item pb-1 pl-1 list_bg border-list">
               <img src="admin/uploads/<?php echo $rec_data['post_image'];?>" class="float-left rounded mr-2 img-fluid" width="70"  alt="<?php echo $rec_data['post_image'];?>">

               <h6 class="">
                <a href="single.php?link=<?php echo $rec_data['post_title'];?>&postid=<?php echo $rec_data['post_id'];?>&subid=<?php echo $rec_data['submenu_id'];?>"><?php echo $rec_data['post_title'];?></a>
               </h6>

               <div class="small"><?php echo $rec_data['date'];?></div>
            </li>
<?php }?>
          </div> 
        </div>

      <div class="col-md-4 pb-4">
        <h5 class="pl-1">কেটাগরি সমুহ</h5>
          <div class="list-group list-group-flush footer_bo">
<?php
$old_menu ="SELECT * FROM  menus   ORDER BY menu_id ASC";
$menu_result=mysqli_query($con,$old_menu);
while($menu_data=mysqli_fetch_assoc($menu_result))
{
 ?>
           <li class="list-group-item pb-1 pl-1 list_bg">
             <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> 

             <a href="categoris.php?categoris.php?clink=<?php echo $menu_data['menu_name'];?>&mid=<?php echo $menu_data['menu_id'];?>"><?php echo $menu_data['menu_name'];?></a>

             <span class="badge float-right"><?php echo $menu_data['post_count'];?></span>
            </li>
<?php }?>
          </div>
      </div>

      <div class="col-md-4 pb-4">
        <h5 class="pl-1">পুরাতন পোস্ট</h5>
          <div class="list-group list-group-flush">

<?php
$old_post ="SELECT posts.post_id, posts.post_title,  posts.post_image, posts.date, posts.menu_id, posts.submenu_id FROM posts LEFT JOIN menus ON posts.menu_id = menus.menu_id LEFT JOIN sub_menu ON posts.submenu_id=sub_menu.submenu_id LEFT JOIN users ON posts.author=users.user_id  WHERE post_status='Enable' ORDER BY post_id ASC LIMIT 3";
$old_result=mysqli_query($con,$old_post);
while($old_data=mysqli_fetch_assoc($old_result))
{
 ?>
            <li class="list-group-item pb-1 pl-1 list_bg border-list">
               <img src="admin/uploads/<?php echo $old_data['post_image'];?>" class="float-left rounded mr-2 img-fluid" width="70"  alt="post image">
               <h6 class=""><a href=""><?php echo $old_data['post_title'];?></a></h6>
               <div class="small"><?php echo $old_data['date'];?></div>
            </li>

<?php }?>
          </div>
      </div>
    </div>
  </div>
</footer>

</body>
</html>

