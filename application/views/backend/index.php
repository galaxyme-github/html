<?php
    $branch = (get_loggedin_user_role() == 'superadmin')?'admin':get_loggedin_user_role();
    $loggedin_user_role = get_loggedin_user_role();
    $loggedin_user_id = get_loggedin_user_id();
    $loggedin_user = $this->user_model->get_user_detail($loggedin_user_id, $loggedin_user_role);
    $exploded = explode('/', $page_name);
    $parent_dir = $exploded[0];
    $file_name  = $exploded[1];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Load BFT metas -->
        <?php include 'partials/metas.php'; ?>
        <!--// BFT metas -->
        <?php include 'partials/styles.php'; ?>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            <?php include 'partials/navbar.php'; ?>
            <!--// Navbar -->

            <!-- Left Sidebar -->
            <?php include $branch . '/navigation/index.php'; ?>
            <!--// Left Sidebar -->

            <!-- Main Container -->
            <div class="content-wrapper">
                <?php include $branch . '/' . $page_name . '.php'; ?>
            </div>
            <!--// Main Container -->

            <!-- BFT Control panel footer -->
            <?php include 'partials/footer.php'; ?>
            <!--// BFT Control panel footer -->
        </div>

        <!-- Load scripts -->
        <?php include 'partials/scripts.php'; ?>
        <!--// Load scripts -->

        <!-- Load modal -->
        <?php include 'partials/modal.php'; ?>
        <!--// Load modal -->
    </body>
</html>