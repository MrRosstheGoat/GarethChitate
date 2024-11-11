<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Define email address to receive messages
    $to = "youremail@example.com";  // Replace with your email address
    $headers = "From: $email";

    // Email Subject and Body
    $email_subject = "New Message from $name: $subject";
    $email_body = "You have received a new message from $name.\n\n".
                  "Email: $email\nPhone: $phone\n\n".
                  "Message:\n$message";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Redirect to a thank-you page after successful submission
        header("Location: thank_you.html");
        exit();  // Stop further execution
    } else {
        echo "Oops! Something went wrong, and we couldn't send your message.";
    }
}
?>
