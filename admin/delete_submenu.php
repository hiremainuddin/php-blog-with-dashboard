<?php
$submenu_id = $_GET['id'];
 include('database/db_connect.php');
 $select_getsubmenu_id   = "DELETE FROM `sub_menu` WHERE `sub_menu`.`submenu_id` = '{$submenu_id}'";
 $submenuid_result  = mysqli_query($con, $select_getsubmenu_id );
 if ($submenuid_result) {
 	header("location: submenu.php");
 }
  
?> 