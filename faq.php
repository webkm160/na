<?php
include 'admin/connection.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch FAQs from the database
$sql = "SELECT * FROM faq"; // Replace 'faq' with your actual table name
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Nanavaty Advocates</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Consulting Website Template Free Download" name="keywords">
    <meta content="Consulting Website Template Free Download" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Oswald:wght@200;300;400&display=swap"
        rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="page">
    <!-- Top Bar Start -->
    <?php 
            include 'topbar.php';
            ?>
    <!-- Top Bar End -->

    <!-- Nav Bar Start -->
    <div class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a href="index.html" class="navbar-brand"><img src="img/White logo - no background.png" alt="Image"></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <?php 
            include 'menu.php';
            ?>
        </div>
    </div>
    <!-- Nav Bar End -->


    <!-- Contact Start -->
    <div class="contact mt-125">
    <div class="container mt-5">
    <h2>Frequently Asked Questions</h2>
    <div class="accordion" id="faqAccordion">
        <?php
        if ($result->num_rows > 0) {
            $counter = 0;
            while ($row = $result->fetch_assoc()) {
                $counter++;
                ?>
                <div class="card">
                    <div class="card-header" id="heading<?php echo $counter; ?>">
                        <h5 class="mb-0">
                            <button class="btn btn-link <?php echo ($counter == 1) ? '' : 'collapsed'; ?>" type="button" data-toggle="collapse" data-target="#collapse<?php echo $counter; ?>" aria-expanded="true" aria-controls="collapse<?php echo $counter; ?>">
                                <?php echo htmlspecialchars($row['question']); ?>
                            </button>
                        </h5>
                    </div>
                    <div id="collapse<?php echo $counter; ?>" class="collapse <?php echo ($counter == 1) ? 'show' : ''; ?>" aria-labelledby="heading<?php echo $counter; ?>" data-parent="#faqAccordion">
                        <div class="card-body">
                            <?php echo nl2br(htmlspecialchars($row['answer'])); ?>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>No FAQs found.</p>";
        }
        ?>
    </div>
</div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
   <?php include('footer.php'); ?> 
    <!-- Footer End -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>

</html>

<?php
// Close connection
$conn->close();
?>
