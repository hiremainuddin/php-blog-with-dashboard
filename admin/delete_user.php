<?php
$getuser_id = $_GET['id'];
 include('database/db_connect.php');
 $select_getmenu_id   = "DELETE FROM `users` WHERE `users`.`user_id` = {$getuser_id}";
 $menuid_result  = mysqli_query($con, $select_getmenu_id );
 if ($menuid_result) {
 	header("location: users.php");
 }
  
?> 