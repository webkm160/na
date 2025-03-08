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
    <!-- jQuery UI CSS for Date Picker -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Bootstrap Timepicker CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">


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
        <div class="container">
            <div class="section-header">
                <p>Consultation Request</p>
                <h2>Have a case ? Send us a details</h2>
            </div>
            <div class="row align-items-center">

                <div class="col-md-12">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form name="sentMessage" id="consultationForm" novalidate="novalidate" enctype="multipart/form-data">

                            <div class="control-group">
                                <input type="text" class="form-control" id="name" placeholder="Your Name"
                                    required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="country" placeholder="Your Country"
                                    required="required"
                                    data-validation-required-message="Please enter your country name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" id="email" placeholder="Your Email"
                                    required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="contactNumber" placeholder="Contact Number"
                                    required="required"
                                    data-validation-required-message="Please enter a contact number" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="whatsappNumber"
                                    placeholder="Whatsapp Number" required="required"
                                    data-validation-required-message="Please enter a whatsapp number" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" id="caseDetail" placeholder="Case Detail in Brief"
                                    required="required"
                                    data-validation-required-message="Please enter your case detail"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="datePicker" placeholder="Select Date"
                                    required="required" data-validation-required-message="Please enter a date" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <label for="hour">Select Hour:</label>
                                <select id="hour" class="form-control" required="required" data-validation-required-message="Please enter a time">
                                    <option value="">Select Hour</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>

                                <label for="ampm">AM/PM:</label>
                                <select id="ampm" class="form-control" required="required" data-validation-required-message="Please select AM/PM">
                                    <option value="">Select AM/PM</option>
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group mb-5">
                                <label for="fileUpload">Attach File</label>
                                <input type="file" class="form-control" id="fileUpload" name="fileUpload" required>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn" type="submit" id="sendMessageButton">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
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
    <!-- jQuery UI for Date Picker -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Bootstrap Timepicker JS -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>




    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- Date & Time Picker Initialization Script -->
    <script>
        $(document).ready(function () {
            // Initialize Date Picker
            $("#datePicker").datepicker({
                dateFormat: "dd-mm-yy",  // Format: Day-Month-Year
                changeMonth: true,
                changeYear: true,
                minDate: 0  // Prevents selecting past dates
            });

            // Initialize Time Picker
            $('#timePicker').timepicker({
                minuteStep: 5,
                showMeridian: true, // AM/PM format
                defaultTime: false
            });
        });
    </script>
</body>

</html>