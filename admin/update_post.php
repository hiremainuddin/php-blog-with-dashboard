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
        <div class="container-fluid">
<?php
include('database/db_connect.php');
$post_id = $_GET['id'];
$query = "SELECT posts.post_id,posts.post_title,posts.post_content, posts.post_image, menus.menu_id,menus.menu_name,sub_menu.submenu_id,sub_menu.submenu_name,users.f_name  from posts left join menus on posts.menu_id=menus.menu_id left join sub_menu on posts.submenu_id=sub_menu.submenu_id left join users on posts.author=users.user_id where post_id='$post_id'";
$result= mysqli_query($con, $query);
$count = mysqli_num_rows($result);
if ($count > 0) {
while($row=mysqli_fetch_assoc($result)){
?>
                 <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add post</h4>
                    <form class="forms-sample" method="POST" action="update_function.php" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="hidden" value="<?php echo $row['post_id']?>" name="post_id">
                        <input type="text" class="form-control" name="title" value="<?php echo $row['post_title']?>">
                      </div>

                      <div class="form-group">
                        <div class="row">

                          <div class="col-sm-8">
                            <label for="exampleTextarea1">Descriptions</label>
                            <textarea class="form-control"  name="desription" rows="4">
                            	<?php echo $row['post_content']?>
                            </textarea>
                          </div>

                         <div class="col-sm-8">
                            <img src="uploads/<?php echo $row['post_image']?>" class="pt-2 pb-2" alt="<?php echo $row['post_image']?>" width="300" height="280">
                            <input type="file" name="file-upload" class="form-control">
                            <input type="hidden" name="old-file-upload" value="<?php echo $row['post_image']?>" class="form-control">
                          </div>

                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Select menu</label>
                        <select class="form-control" name=menu_id id="menu_id"  required>
                          <option disabled selected>Select menu</option>
<?php

include('database/db_connect.php');
$sql  ="SELECT * FROM menus";
$menu_query= mysqli_query($con,$sql);
if (mysqli_num_rows($menu_query) > 0) {
while ($menu_row = mysqli_fetch_assoc($menu_query)){
if ($menu_row['menu_id'] == $row['menu_id']) {
$selected = "selected";
}else{
$selected ="";
}
echo"<option {$selected} value='{$menu_row['menu_id']}'>{$menu_row['menu_name']}</option>";
}

}
?>                       </select>

                      <input type="hidden" name="old_menuid" value="<?php echo $row['menu_id'];?>">
                      </div>
                       <div class="form-group">
                          <label for="exampleSelectGender">Select Submenu</label>
                          <select name="submenu_id" id="submenu_id" class="form-control"></select>      
                         <input type="hidden" name="old_submenuid" value="<?php echo $row['submenu_id'];?>">      
                       </div>
                      <button type="submit" name="submit" class="btn btn-primary mr-2">Update</button>
                    </form>
                  </div>
              </div>
<?php 
 }
}else{
  echo"No Records Found";
}

  ?>
        </div>
    </div>

</div>  



<script>
$(document).ready(function() {
  $('#menu_id').on('change', function() {
      var menu_id = this.value;
      $.ajax({
        url: "get_submenu.php",
        type: "POST",
        data: {
          menu_id: menu_id
        },
        cache: false,
        success: function(dataResult){
          $("#submenu_id").html(dataResult);
        }
      });
    
    
  });
});
</script>
<?php include('includes/footer.php');?>