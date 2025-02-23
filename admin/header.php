<?php
// Get the current page filename
$current_page = basename($_SERVER['PHP_SELF']);

?>

<!-- header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .content {
            padding: 30px;
        }
    </style>
</head>
<body>
    <!-- Navbar at the top -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Blog Menu Item -->
                    <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'index.php' || $current_page == 'add.php' || $current_page == 'edit.php') ? 'active' : ''; ?>" href="http://localhost/na/admin/blog/index.php">Blog</a>
                    </li>
                    <!-- FAQ Menu Item -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'faq.php') ? 'active' : ''; ?>" href="http://localhost/na/admin/faq.php">FAQ</a>
                    </li>
                    <!-- Categories Menu Item -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'category.php') ? 'active' : ''; ?>" href="http://localhost/na/admin/category.php">Categories</a>
                    </li>
                    <!-- Logout Menu Item -->
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger btn-sm text-white" href="http://localhost/na/admin/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
