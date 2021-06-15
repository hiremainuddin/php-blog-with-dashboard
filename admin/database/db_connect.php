<?php
$con=mysqli_connect('localhost','root','','sm_blog');

if(mysqli_connect_errno())
{
	echo 'Failed to connect '.mysqli_connect_error();
}
?>