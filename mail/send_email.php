<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form fields
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Set the recipient email address
   // $to = "info@nanavatyadvocates.com";  // Your email
   $to = "m.mahesh.p@gmail.com";

    // Set the email subject
    $email_subject = "New Inquiry";

    // Set the email content
    $email_body = "You have received a new message from the contact form on your website.\n\n".
                  "Name: $name\n".
                  "Email: $email\n\n".
                  "Message:\n$message\n";

    // Set the email headers
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";
    $headers .= "Content-type: text/plain; charset=UTF-8";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Redirect to a thank you page or show success message
        echo "Thank you for contacting us. We will get back to you shortly.";
    } else {
        echo "There was an error processing your request. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
exit;
?>
