<?php
// Check if the form was submitted
$successMessage = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database (adjust these values)
    include 'admin/connection.php';

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize form inputs
    $name = $_POST['name'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $contactNumber = $_POST['contactNumber'];
    $whatsappNumber = $_POST['whatsappNumber'];
    $caseDetail = $_POST['caseDetail'];
    $date = $_POST['datePicker'];
    $hour = $_POST['hour'];
    $ampm = $_POST['ampm'];


    $to = "info@nanavatyadvocates.com";

    // Subject of the email
    $subject = "New Consultation Request";

    // Email message with form data
    $message = "
    <html>
    <head>
        <title>New Consultation Request</title>
    </head>
    <body>
        <p>You have received a new consultation request:</p>
        <table>
            <tr>
                <th>Name:</th>
                <td>$name</td>
            </tr>
            <tr>
                <th>Country:</th>
                <td>$country</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>$email</td>
            </tr>
            <tr>
                <th>Contact Number:</th>
                <td>$contactNumber</td>
            </tr>
            <tr>
                <th>WhatsApp Number:</th>
                <td>$whatsappNumber</td>
            </tr>
            <tr>
                <th>Case Detail:</th>
                <td>$caseDetail</td>
            </tr>
            <tr>
                <th>Date:</th>
                <td>$date</td>
            </tr>
            <tr>
                <th>Time:</th>
                <td>$hour $ampm</td>
            </tr>
        </table>
    </body>
    </html>
    ";

    // To send HTML mail, the Content-type header must be set
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";

    // Additional headers
    $headers .= "From: $email" . "\r\n";

    // Send email
    if(mail($to, $subject, $message, $headers)) {
        echo "Your consultation request has been sent successfully.";
    } else {
        echo "There was an error sending the email.";
    }

    // Handle file upload
    if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] == 0) {
        $fileTmpName = $_FILES['fileUpload']['tmp_name'];
        $fileName = $_FILES['fileUpload']['name'];
        $fileSize = $_FILES['fileUpload']['size'];
        $fileType = $_FILES['fileUpload']['type'];

        // Specify the directory where the file will be uploaded
        $uploadDir = 'documents/';
        $uploadFilePath = $uploadDir . basename($fileName);

        // Move the uploaded file to the desired directory
        if (move_uploaded_file($fileTmpName, $uploadFilePath)) {
            // Insert form data into the database
            $stmt = $conn->prepare("INSERT INTO consultations (name, country, email, contact_number, whatsapp_number, case_detail, date, hour, ampm, file_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssssss", $name, $country, $email, $contactNumber, $whatsappNumber, $caseDetail, $date, $hour, $ampm, $uploadFilePath);

            // Execute the query
            if ($stmt->execute()) {
                $successMessage = "Your consultation request has been submitted successfully!";
            } else {
                $successMessage = "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $successMessage = "Error uploading the file.";
        }
    } else {
        $successMessage = "No file uploaded or error in file upload.";
    }

    // Close the database connection
    $conn->close();
}
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
                        <div id="success">
                            <?php if ($successMessage): ?>
                                <!-- Success Message -->
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> <?php echo $successMessage; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                        <form name="sentMessage" id="consultationForm1" method="POST" action="quote.php" enctype="multipart/form-data">

                            <div class="control-group">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name"
                                    required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" name="country" id="country" placeholder="Your Country"
                                    required="required"
                                    data-validation-required-message="Please enter your country name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                                    required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" name="contactNumber" id="contactNumber" placeholder="Contact Number"
                                    required="required"
                                    data-validation-required-message="Please enter a contact number" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="whatsappNumber" name="whatsappNumber"
                                    placeholder="Whatsapp Number" required="required"
                                    data-validation-required-message="Please enter a whatsapp number" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" id="caseDetail" name="caseDetail" placeholder="Case Detail in Brief"
                                    required="required"
                                    data-validation-required-message="Please enter your case detail"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="datePicker" name="datePicker" placeholder="Select Date"
                                    required="required" data-validation-required-message="Please enter a date" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <label for="hour">Select Hour:</label>
                                <select id="hour" name="hour" class="form-control" required="required" data-validation-required-message="Please enter a time">
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
                                <select id="ampm" name="ampm" class="form-control" required="required" data-validation-required-message="Please select AM/PM">
                                    <option value="">Select AM/PM</option>
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group mb-5">
                                <label for="fileUpload">Attach File</label>
                                <input type="file" class="form-control"  id="fileUpload" name="fileUpload" required>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn" type="submit" id="sendMessageButton1">Send Message</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>

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
