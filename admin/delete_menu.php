<?php
$getmenu_id = $_GET['id'];
 include('database/db_connect.php');
 $select_getmenu_id   = "DELETE FROM `menus` WHERE `menus`.`menu_id` = '{$getmenu_id}'";
 $menuid_result  = mysqli_query($con, $select_getmenu_id );
 if ($menuid_result) {
 	header("location: menus.php");
 }
  
?> 