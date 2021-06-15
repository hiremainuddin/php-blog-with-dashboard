<html>
	<body>
		
<?php
include('database/db_connect.php');
$post_enable= $_GET['enable'];
$post_id= $_GET['pid'];

$enable_data="UPDATE `posts` SET `post_status` = '$post_enable' WHERE `posts`.`post_id` = '$post_id'";
$query =mysqli_query($con, $enable_data);
if ($query) {
	header("location: unactive_post.php");
}

?>
	</body>
</html>