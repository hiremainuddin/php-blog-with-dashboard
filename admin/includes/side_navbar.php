<?php
if (!isset($_SESSION['user_name'])) {
 header('location: index.php');
}
?>
<nav id="sidebar" class="text-white">
        <div class="sidebar-header  text-white">
            <img class="mx-auto d-block rounded-circle" src="images/admin.jpg" alt="admin image" width="100">
            <h4 class="text-center">Admin</h4>
        </div>

        <ul class="list-unstyled components text-white small">
            <li class="active">
                <a href="dashboard.php">Dashboard</a>
            </li>

<?php
if ($_SESSION['role'] == 1) {
    ?>
            <li>
                <a href="menus.php">Menu item</a>
            </li>
            <li>
                <a href="submenu.php">sub menu item</a>
            </li>

<?php }?>

            <li>
                <a href="post.php">Post Management</a>
           </li>
<?php
if ($_SESSION['role'] == 1) {
    ?>
            <li>
                <a href="unactive_post.php">Pandding Post</a>
            </li>
            <li>
                <a href="users.php">User Mananement</a>
            </li>
<?php }?>
        </ul>
    </nav>