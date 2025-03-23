<?php
include 'admin/connection.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch FAQs from the database
$sql = "SELECT * FROM practice_area"; // Replace 'practice_area' with your actual table name
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

    <style>
        .navbar {
            background: #092a49 !important;
        }
    </style>
</head>

<body class="page">
    <!-- Top Bar Start -->
    <?php include 'topbar.php'; ?>
    <!-- Top Bar End -->

    <!-- Nav Bar Start -->
    <div class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand"><img src="img/White logo - no background.png" alt="Image"></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php include 'menu.php'; ?>
        </div>
    </div>
    <!-- Nav Bar End -->

    <!-- Single Page Start -->
    <div class="single mt-125">
        <div class="container">
            <div class="section-header">
                <h2>Areas of Practice</h2>
            </div>

            <!-- Accordion Section Start -->
            <div class="accordion" id="aboutAccordion">
                <div class="row">
                    <?php
                    // Dynamically create accordion items from the database
                    if ($result->num_rows > 0) {
                        $counter = 0;
                        while ($area = $result->fetch_assoc()) {
                            $collapseId = "collapse" . $counter;
                            $headingId = "heading" . $counter;
                            
                            // Start a new row after every 2 columns (i.e., when $counter is even)
                            if ($counter % 2 == 0 && $counter != 0) {
                                echo '</div><div class="row">';  // Close the previous row and start a new one
                            }
                    ?>
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="card-header" id="<?php echo $headingId; ?>">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link toggle-btn" type="button" data-toggle="collapse"
                                                data-target="#<?php echo $collapseId; ?>" aria-expanded="false"
                                                aria-controls="<?php echo $collapseId; ?>">
                                            <?php echo htmlspecialchars($area['question']); ?> <i class="fa fa-chevron-down"></i>
                                        </button>
                                    </h2>
                                </div>
                                <div id="<?php echo $collapseId; ?>" class="collapse" aria-labelledby="<?php echo $headingId; ?>"
                                     data-parent="#aboutAccordion">
                                    <div class="card-body">
                                        <?php echo nl2br(htmlspecialchars($area['answer'])); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php 
                        $counter++;
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- Accordion Section End -->
        </div>
    </div>
    <!-- Single Page End -->

    <!-- Footer Start -->
    <?php include('footer.php'); ?> 
    <!-- Footer End -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

    <!-- Your custom script for toggle icons and collapse behavior -->
    <script>
    $(document).ready(function () {
        $(".toggle-btn").click(function () {
            var icon = $(this).find("i");
            var isOpen = $(this).attr("aria-expanded") === "true";

            // Toggle the arrow direction correctly
            if (!isOpen) {
                icon.removeClass("fa-chevron-down").addClass("fa-chevron-up");
            } else {
                icon.removeClass("fa-chevron-up").addClass("fa-chevron-down");
            }
        });

        // Ensure only one section is open at a time
        $('.collapse').on('shown.bs.collapse', function () {
            $(this).parent().find(".toggle-btn i").removeClass("fa-chevron-down").addClass("fa-chevron-up");
        }).on('hidden.bs.collapse', function () {
            $(this).parent().find(".toggle-btn i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
        });
    });
    </script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
