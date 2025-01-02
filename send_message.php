<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $to = "ahmtercanli@gmail.com";
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $body = "<h2>Contact Form Submission</h2>";
    $body .= "<p><strong>Name:</strong> {$name}</p>";
    $body .= "<p><strong>Email:</strong> {$email}</p>";
    $body .= "<p><strong>Subject:</strong> {$subject}</p>";
    $body .= "<p><strong>Message:</strong><br>{$message}</p>";

    if (mail($to, $subject, $body, $headers)) {
        $feedback = "Message sent successfully!";
    } else {
        $feedback = "Failed to send message.";
    }
} else {
    $feedback = "Invalid request.";
}
header("Location: contact.html?feedback=" . urlencode($feedback));
exit();
?>
