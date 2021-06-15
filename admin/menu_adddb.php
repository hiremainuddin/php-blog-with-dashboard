<?php
include 'database/db_connect.php';

if(isset($_POST['menu_submit']))
{
	$menu_name=$_POST['menu_name'];
	
	if($menu_name!='')
	{
		$insertqry ="INSERT INTO `menus`( `menu_name`) VALUES ('$menu_name')";
		$insertres=mysqli_query($con,$insertqry);
	}
}
echo '<script>alert(" Menu is added successfully.");
		window.location="menus.php";
</script>';
?>