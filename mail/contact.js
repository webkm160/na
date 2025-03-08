$(document).ready(function () {
    // Attach the submit event handler to the form
    $("#contactForm").submit(function (event) {
        console.log('test2232323s')
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
                url: "mail/send_email.php", // Your PHP script that sends the email
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

    $("#consultationForm").submit(function (event) {
        event.preventDefault();  // Prevent the default form submission

        var formData = new FormData(this);  // Create a FormData object from the form (including file)

        // Make sure all fields are filled
        var name = $('#name').val();
        var email = $('#email').val();
        var country = $('#country').val();
        var contactNumber = $('#contactNumber').val();
        var whatsappNumber = $('#whatsappNumber').val();
        var caseDetail = $('#caseDetail').val();
        var datePicker = $('#datePicker').val();
        var hour = $('#hour').val();
        var ampm = $('#ampm').val();

        if (name && email && country && contactNumber && whatsappNumber && caseDetail && datePicker && hour && ampm) {
            // Perform an Ajax request to send the form data to send_email.php
            $.ajax({
                type: "POST",
                url: "mail/send_email_consultation.php", // Your PHP script that sends the email
                data: formData,  // Send the form data
                contentType: false,  // Prevent jQuery from automatically setting content type
                processData: false,  // Don't process the data (handle it as FormData)
                success: function (response) {
                    // Success response from the server (email sent successfully)
                    alert("Thank you for your message! We will get back to you soon.");
                    $("#consultationForm")[0].reset();  // Optionally reset the form after submission
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
