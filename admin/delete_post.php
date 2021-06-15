<?php
$getpost_id = $_GET['id'];
$menu_id    = $_GET['mid'];
$submenu_id    = $_GET['smid'];
include('database/db_connect.php');

$query    ="SELECT * FROM `posts` WHERE `posts`.`post_id` = {$getpost_id}";
$getpost_result  = mysqli_query($con, $query);
$row      = mysqli_fetch_assoc($getpost_result);

unlink("uploads/".$row['post_image']);

$sql ="DELETE FROM `posts` WHERE `posts`.`post_id` = {$getpost_id};";
$sql .="UPDATE `menus` SET `post_count` = post_count - 1 WHERE `menus`.`menu_id` ={$menu_id};";
$sql .="UPDATE `sub_menu` SET `post_count` = post_count - 1 WHERE `sub_menu`.`submenu_id` ={$submenu_id}";
$post_result  = mysqli_multi_query($con, $sql);
if ($post_result) {
header("location: post.php");
}

?>