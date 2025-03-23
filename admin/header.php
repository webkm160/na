<?php
// Assuming you have a valid $conn connection to your database
// Get the current page filename
$current_page = basename($_SERVER['PHP_SELF']);

// Query to count unread contact us inquiries
$contact_query = "SELECT COUNT(*) AS unread_contact_count FROM contact_us WHERE status = 'unread'"; 
$contact_result = $conn->query($contact_query);
$contact_row = $contact_result->fetch_assoc();
$unread_contact_count = $contact_row['unread_contact_count'];

// Query to count unread consultations
$consultation_query = "SELECT COUNT(*) AS unread_consultation_count FROM consultations WHERE status = 'unread'"; 
$consultation_result = $conn->query($consultation_query);
$consultation_row = $consultation_result->fetch_assoc();
$unread_consultation_count = $consultation_row['unread_consultation_count'];
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
        /* Add margin to navbar items */
        .navbar-nav .nav-item {
            margin-right: 15px; /* Adjust space between items */
        }
        /* Optional: You can add more space on the last item */
        .navbar-nav .nav-item:last-child {
            margin-right: 0; /* Remove margin for the last item (Logout) */
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
                        <a class="nav-link <?php echo ($current_page == 'index.php' || $current_page == 'add.php' || $current_page == 'edit.php') ? 'active' : ''; ?>" href="https://nanavatyadvocates.com/admin/blog/index.php">Blog</a>
                    </li>
                    <!-- FAQ Menu Item -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'faq.php') ? 'active' : ''; ?>" href="https://nanavatyadvocates.com/admin/faq.php">FAQ</a>
                    </li>
                    <!-- Categories Menu Item -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'category.php') ? 'active' : ''; ?>" href="https://nanavatyadvocates.com/admin/category.php">Categories</a>
                    </li>
                    <!-- Practice Area Menu Item -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'pa.php') ? 'active' : ''; ?>" href="https://nanavatyadvocates.com/admin/pa.php">Practice Area</a>
                    </li>
                    <!-- Documents Item -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'document.php') ? 'active' : ''; ?>" href="https://nanavatyadvocates.com/admin/document.php">Documents</a>
                    </li>
                    <!-- Contact Us Item with Unread Count -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'contactus.php') ? 'active' : ''; ?>" href="https://nanavatyadvocates.com/admin/contactus.php">
                            Inquiries
                            <span class="badge bg-danger"><?php echo $unread_contact_count; ?></span> <!-- Display unread inquiries count -->
                            <i class="fas fa-bell"></i> <!-- Notification Icon -->
                        </a>
                    </li>
                    <!-- Consultations Item with Unread Count -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'consultations.php') ? 'active' : ''; ?>" href="https://nanavatyadvocates.com/admin/consultations.php">
                            Consultations
                            <span class="badge bg-danger"><?php echo $unread_consultation_count; ?></span> <!-- Display unread consultations count -->
                            <i class="fas fa-bell"></i> <!-- Notification Icon -->
                        </a>
                    </li>
                    <!-- Logout Menu Item -->
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger btn-sm text-white" href="https://nanavatyadvocates.com/admin/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>
