<?php
	include 'database/db_connect.php';
	$menu_id = $_POST["menu_id"];
	$result = mysqli_query($con,"SELECT * FROM sub_menu where menu_id=$menu_id");
?>
<option value="">Select Sub Menu</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
	<option value="<?php echo $row["submenu_id"];?>"><?php echo $row["submenu_name"];?></option>
<?php
}
?>