<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form fields
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $country = htmlspecialchars($_POST['country']);
    $contactNumber = htmlspecialchars($_POST['contactNumber']);
    $whatsappNumber = htmlspecialchars($_POST['whatsappNumber']);
    $caseDetail = htmlspecialchars($_POST['caseDetail']);
    $datePicker = htmlspecialchars($_POST['datePicker']);
    $hour = htmlspecialchars($_POST['hour']);
    $ampm = htmlspecialchars($_POST['ampm']);
    $message = htmlspecialchars($_POST['message']);

    // Set the recipient email address
    // $to = "info@nanavatyadvocates.com";  // Your email
    $to = "m.mahesh.p@gmail.com"; // Change this to your email address

    // Set the email subject
    $email_subject = "New Inquiry";

    // Set the email content (HTML format)
    $email_body = "
        <html>
        <head><title>$email_subject</title></head>
        <body>
        <h2>You have received a new message from the contact form</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Country:</strong> $country</p>
        <p><strong>Contact Number:</strong> $contactNumber</p>
        <p><strong>Whatsapp Number:</strong> $whatsappNumber</p>
        <p><strong>Case Detail:</strong> $caseDetail</p>
        <p><strong>Date:</strong> $datePicker</p>
        <p><strong>Time:</strong> $hour $ampm</p>
        <p><strong>Message:</strong><br/>$message</p>
        </body>
        </html>";

   

    // Set the email headers for HTML email
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";
    // $headers .= "MIME-Version: 1.0\r\n";
    // $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Success response
        // echo "Thank you for contacting us. We will get back to you shortly.";
        echo $name;
    } else {
        // Error handling
        echo "There was an error processing your request. Please try again later.";
    }
} else {
    // Invalid request
    echo "Invalid request method.";
}
exit;
?>
