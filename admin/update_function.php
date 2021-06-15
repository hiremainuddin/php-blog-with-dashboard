<?php
include('database/db_connect.php');

if (empty($_FILES['file-upload']['name'])){
$new_name = $_POST['old-file-upload'];
}else{

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

$new_name = time()."-".basename($file_name);
$target = "uploads/".$new_name;


if ($new_name) {
	$query    ="SELECT * FROM `posts` WHERE `posts`.`post_id` = '{$_POST["post_id"]}'";
    $getpost_result  = mysqli_query($con, $query);
    $row      = mysqli_fetch_assoc($getpost_result);
    unlink("uploads/".$row['post_image']);
}






if (empty($errors) == true) {
move_uploaded_file($file_tmp, $target);
}else{
print_r($errors);
die();
 }

}


$post_id    = test_input($_POST["post_id"]);
$title      = test_input($_POST["title"]);
$desription = test_input($_POST["desription"]);
$menu_id    = test_input($_POST["menu_id"]);
$old_menuid = test_input($_POST["old_menuid"]);
$submenu_id = test_input($_POST["submenu_id"]);
$old_submenuid = test_input($_POST["old_submenuid"]);


$sql ="UPDATE `posts` SET `post_title` = '{$title}', `post_content` = '{$desription}', `post_image` = '{$new_name}', `menu_id` = '{$menu_id}', `submenu_id` = '{$submenu_id}' WHERE `posts`.`post_id` = {$post_id};";


if ($menu_id != $old_menuid) {
 $sql .="UPDATE `menus` SET `post_count` = post_count - 1 WHERE `menus`.`menu_id`={$old_menuid};";
 $sql .="UPDATE `menus` SET `post_count` = post_count + 1 WHERE `menus`.`menu_id`={$menu_id};";

}

if ($submenu_id != $old_submenuid) {
 $sql .="UPDATE `sub_menu` SET `post_count` = post_count - 1 WHERE `sub_menu`.`submenu_id`={$old_submenuid};";
 $sql .="UPDATE `sub_menu` SET `post_count` = post_count + 1 WHERE `sub_menu`.`submenu_id`={$submenu_id};";

}

$result = mysqli_multi_query($con, $sql) or die("Query filed");

if ($result){
header("location: post.php");
}else{
echo "query failed";
} 

function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

?>
