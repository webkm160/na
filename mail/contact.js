$(document).ready(function () {
    // Attach the submit event handler to the form
    $("#contactForm").submit(function (event) {
        event.preventDefault();  // Prevent the default form submission

        var name = $('#name').val();
        var email = $('#email').val();
        var subject = $('#subject').val();
        var message = $('#message').val();

        // Check if the fields are not empty
        if (name && email && subject && message) {
            // Perform an Ajax request to send the form data to a server-side script (send_email.php)
            $.ajax({
                type: "POST",
                url: "send_email.php", // Your PHP script that sends the email
                data: {
                    name: name,
                    email: email,
                    subject: subject,
                    message: message
                },
                success: function (response) {
                    // Success response from the server (email sent successfully)
                    alert("Thank you for your message! We will get back to you soon.");
                    $("#contactForm")[0].reset(); // Optionally reset the form after submission
                },
                error: function () {
                    // Error handling if the email was not sent
                    alert("There was an error sending your message. Please try again later.");
                }
            });
        } else {
            // If any field is empty, show an alert
            alert("Please fill in all fields before submitting.");
        }
    });
});
