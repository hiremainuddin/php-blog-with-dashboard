<?php
// define variables and set to empty value
if ($_SERVER["REQUEST_METHOD"] == "POST"){
include('database/db_connect.php');

$title      = test_input($_POST["title"]);
$desription = test_input($_POST["desription"]);
$menu_id    = test_input($_POST["menu_id"]);
$submenu_id = test_input($_POST["submenu_id"]);
$author     = test_input($_POST["user_id"]);
$date       = date("Y.m.d");

$errors = array();
$file_name = $_FILES['file-upload']['name'];
$file_size = $_FILES['file-upload']['size'];
$file_tmp  = $_FILES['file-upload']['tmp_name'];
$file_type = $_FILES['file-upload']['type'];
$file_ext  = end(explode('.', $file_name));

$extensions= array('jpg','png','jpeg');

if (in_array($file_ext,$extensions) === false) {
$errors[]="This allwed only jpg png jpeg";
}
if ($file_size > 2091702) {
$errors[] ="File must be 2mb or lower";
}
$new_file_name = time()."-".basename($file_name);
$target = "uploads/".$new_file_name;

if (empty($errors) == true) {
move_uploaded_file($file_tmp, $target);
}else{
print_r($errors);
die();
}

$postdata ="INSERT INTO `posts` (`post_title`, `post_content`, `post_image`, `menu_id`, `submenu_id`, `author`, `date`) VALUES ('$title', '$desription', '$new_file_name', '$menu_id', '$submenu_id', '$author', '$date');";
$postdata .="UPDATE `sub_menu` SET `post_count` = post_count + 1 WHERE `sub_menu`.`submenu_id`={$submenu_id};";
$postdata .="UPDATE `menus` SET `post_count` = post_count + 1 WHERE `menus`.`menu_id`={$menu_id};";
// $postdata .="UPDATE `sub_menu` SET `post_count` = post_count + 1 WHERE `sub_menu`.`submenu_id`={$submenu_id}";
$result = mysqli_multi_query($con, $postdata) or die("Query filed".mysqli_error($con));
if ($result) {
header("location: post.php");
}  

}


function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?> 
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
        <div class="container-fluid p-4">
                 <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add post</h4>
                    <form class="forms-sample" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" name="title"  placeholder="Title" required>
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-8">
                            <label for="exampleTextarea1">Descriptions</label>
                            <textarea class="form-control"   name="desription" rows="4" required></textarea>
                          </div>
                          <div class="col-sm-8 pt-2">
                            <label for="exampleTextarea1">Image upload</label>
                            <input type="file" class="form-control" name="file-upload" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Select menu</label>
                        <select class="form-control" name=menu_id id="menu_id" required>
                          <option disabled selected>Select menu</option>
                           <?php
                              include('database/db_connect.php');
                              $sql  ="SELECT * FROM menus";
                              $query= mysqli_query($con,$sql);
                              if (mysqli_num_rows($query) > 0) {
                                while ($row = mysqli_fetch_assoc($query)) {
                                 echo"<option value='{$row['menu_id']}'>{$row['menu_name']}</option>";
                                }
                              }
                             ?>
                        </select>
                      </div>
                       <div class="form-group">
                        <label for="exampleSelectGender">Select Submenu</label>
                        <select name="submenu_id" id="submenu_id" class="form-control"></select>
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary mr-2">Add</button>
                    </form>
                  </div>
              </div>
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
<!-- footer include -->
<?php include('includes/footer.php');?>
