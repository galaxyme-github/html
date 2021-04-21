<?php
    $exploded = explode('/', $page_name);
    $parent_dir = $exploded[0];
    $file_name  = $exploded[1];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <?php include "layout/partials/metas.php"; ?>
    <!-- Styles -->
    <?php include 'layout/partials/styles.php'; ?>
</head>
    <!-- Preloader -->
    <div class="loader-container">
        <div class="lds-dual-ring"></div>
    </div>
    <!-- Header -->
    <?php include 'layout/header.php'; ?>
    <!-- Main Content -->
    <?php include $page_name . '.php'; ?>
    <!-- Scripts -->
    <?php include 'layout/partials/scripts.php'; ?>
</body>
</html>
