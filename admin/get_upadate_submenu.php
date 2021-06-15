<?php
include 'database/db_connect.php';
$menu_id  = $_POST["menu_id"];
$p_result = mysqli_query($con,"SELECT submenu_id FROM posts");
while ($p_row= mysqli_fetch_array($p_result)) {
$result = mysqli_query($con,"SELECT * FROM sub_menu where menu_id=$menu_id");
?>
<option value="">Select Sub Menu</option>
<?php
while($row = mysqli_fetch_array($result)) {
if ($row['submenu_id'] == $p_row['submenu_id']){
$selected = "selected";
}else{
$selected ="";
}
echo'<option {$selected} value="<?php echo $row["submenu_id"];?>"><?php echo $row["submenu_name"];?></option>';
?>
<?php
}
}
?>