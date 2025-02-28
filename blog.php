<?php
// Connect to your database (make sure you update with your credentials)
include 'admin/connection.php';



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Number of blogs per page
$blogs_per_page = 4;

// Get the current page from the URL (default to 1 if not set)
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the starting point for the query
$offset = ($current_page - 1) * $blogs_per_page;

// Fetch blogs from the database with LIMIT and OFFSET for pagination
$sql = "SELECT blog.title, blog.content, blog.id, blog.image_path, categories.name AS category
        FROM blog
        JOIN categories ON blog.category_id = categories.id
        ORDER BY blog.id DESC
        LIMIT $blogs_per_page OFFSET $offset";

$result = $conn->query($sql);

// Get total number of blogs to calculate pagination
$total_sql = "SELECT COUNT(*) AS total FROM blog";
$total_result = $conn->query($total_sql);
$total_row = $total_result->fetch_assoc();
$total_blogs = $total_row['total'];
$total_pages = ceil($total_blogs / $blogs_per_page);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Nanavaty Advocates</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Consulting Website Template Free Download" name="keywords">
    <meta content="Consulting Website Template Free Download" name="description">
    <link href="img/favicon.ico" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Oswald:wght@200;300;400&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Top Bar Start -->
    <?php include 'topbar.php'; ?>
    <!-- Top Bar End -->

    <!-- Nav Bar Start -->
    <div class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a href="index.html" class="navbar-brand"><img src="img/White logo - no background.png" alt="Image"></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php include 'menu.php'; ?>
        </div>
    </div>
    <!-- Nav Bar End -->

    <!-- Blog Start -->
    <div class="blog blog-page mt-125">
        <div class="container">
            <div class="section-header">
                <p>Consulting Blog</p>
                <h2>Latest From Our Consulting Blog</h2>
            </div>
            <div class="row">
                <?php
                // Check if there are blogs to display
                if ($result->num_rows > 0) {
                    // Loop through the rows of the blog posts
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col-md-6">
                            <div class="blog-item">
                                <div class="blog-img">
                                    <img src="admin/uploads/<?php echo htmlspecialchars($row['image_path']); ?>" width="600" height="400" alt="Blog">
                                </div>
                                <div class="blog-content">
                                    <h2 class="blog-title"><?php echo htmlspecialchars($row['title']); ?></h2>
                                    <div class="blog-meta">
                                        <i class="fa fa-list-alt"></i>
                                        <a href="#"><?php echo htmlspecialchars($row['category']); ?></a>
                                        <i class="fa fa-calendar-alt"></i>
                                        <p><?php echo date('d-M-Y', strtotime($row['created_at'])); ?></p>
                                    </div>
                                    <div class="blog-text">
                                        <p><?php echo substr($row['content'], 0, 150) . "..."; ?></p>
                                        <a class="btn" href="#" data-toggle="modal" data-target="#blogModal" onclick="openModal('<?php echo addslashes($row['title']); ?>', '<?php echo $row['content']; ?>', '<?php echo addslashes($row['category']); ?>')">Read More</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>No blogs found.</p>";
                }
                ?>
            </div>

            <!-- Pagination -->
            <div class="row">
                <div class="col-12">
                    <ul class="pagination justify-content-center">
                        <li class="page-item <?php if ($current_page == 1) echo 'disabled'; ?>">
                            <a class="page-link" href="?page=<?php echo $current_page - 1; ?>">Previous</a>
                        </li>
                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                            <li class="page-item <?php if ($i == $current_page) echo 'active'; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php } ?>
                        <li class="page-item <?php if ($current_page == $total_pages) echo 'disabled'; ?>">
                            <a class="page-link" href="?page=<?php echo $current_page + 1; ?>">Next</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->

    <!-- Modal Structure -->
<div class="modal fade" id="blogModal" tabindex="-1" aria-labelledby="blogModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="blogModalLabel">Blog Title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3 id="modalCategory">Category: <span></span></h3>
        <p id="modalContent">Loading content...</p>
      </div>
    </div>
  </div>
</div>


    <!-- Footer Start -->
    <?php include('footer.php'); ?>
    <!-- Footer End -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>
    <script src="js/main.js"></script>
    <script>
    function openModal(title, content, category) {
        // Set the title in the modal
        document.getElementById('blogModalLabel').textContent = title;
        
        // Set the content in the modal
        document.getElementById('modalContent').textContent = content;
        
        // Set the category in the modal
        document.getElementById('modalCategory').querySelector('span').textContent = category;
    }
</script>

</body>
</html>
