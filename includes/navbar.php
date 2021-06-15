 <?php include("db_connect.php");
 ?>
<!-- navigation -->
  <nav class="navbar navbar-expand-lg  shadow-sm">
        <a class="navbar-brand text-white" href="index.php">ISLAM TEACH</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="btn"><i class="fa fa-th-large" aria-hidden="true"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto topnav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">হোম পেজ <span class="sr-only">(current)</span></a>
                </li>
<?php
$url= basename($_SERVER['REQUEST_URI']);
///get the sub menu id 

$menulistqry="SELECT * FROM menus where menu_id";
$menulistres=mysqli_query($con,$menulistqry);
while($menulistdata=mysqli_fetch_assoc($menulistres))
{
$menu_id=$menulistdata['menu_id'];
?> 
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $menulistdata['menu_name'];?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
<?php
$submenulistqry="SELECT * FROM sub_menu where sub_menu.menu_id='$menu_id'";
$submenulistres=mysqli_query($con,$submenulistqry);
while($submenulistdata=mysqli_fetch_assoc($submenulistres))
{
?>
                     <a class="dropdown-item" href="sub_categoris.php?smlink=<?php echo $submenulistdata['submenu_name'];?>&smid=<?php echo $submenulistdata['submenu_id'];?>"><?php echo $submenulistdata['submenu_name'];?></a>
<?php }?>
                    </div>

                </li>
<?php }?>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">সম্পর্কে</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">যোগাযোগ</a>
                </li>
            </ul>
        </div>


            <!-- The Modal -->
          
    </nav>
