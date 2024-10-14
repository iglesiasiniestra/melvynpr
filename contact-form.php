<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form input data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $find_us = htmlspecialchars(trim($_POST['find-us']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Define the recipient email
    $to = "contactform@sinisterchurch.org";  // Your email address
    $subject = "New Contact Form Submission from $name";

    // Email content
    $body = "You have received a new message from the contact form.\n\n";
    $body .= "Full Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "How did you find us?: $find_us\n";
    $body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        // Redirect to the thank you page after submission
        header("Location: thankyou.html");
        exit;
    } else {
        // If mail sending fails, display an error message
        echo "Sorry, your message could not be sent. Please try again later.";
    }
}
?>