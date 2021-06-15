<?php
include 'database/db_connect.php';

if(isset($_POST['submenu_submit']))
{
	$menu_id=$_POST['menu_id'];
	$submenu_name=$_POST['submenu_name'];

	if($submenu_name!='')
	{
		$insertqry="INSERT INTO `sub_menu`( `menu_id`, `submenu_name`) VALUES ('$menu_id','$submenu_name')";
		$insertres=mysqli_query($con,$insertqry);
	}
}
echo '<script>alert("Sub Menu is added successfully.");
		window.location="submenu.php";
</script>';
?>