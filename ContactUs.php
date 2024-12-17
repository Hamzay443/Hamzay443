<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST['senderName']);
    $email = htmlspecialchars($_POST['senderEmail']);
    $message = htmlspecialchars($_POST['message']);

    $to = "knightCreativity@gmail.com";
    $subject = "Contact Us Form Submission";
    
    $emailContent = "Name: $name\n";
    $emailContent .= "Email: $email\n\n";
    $emailContent .= "Message:\n$message\n";
    
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $subject, $emailContent, $headers)) {
        echo "<script>alert('Your message has been sent successfully!');</script>";
    } else {
        echo "<script>alert('There was an error sending your message. Please try again later.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Processed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Thank you for your message!</h2>
        <p>Your message has been successfully sent. We will get back to you as soon as possible.</p>
        <a href="contactus.html" class="btn btn-primary">Go back to Contact Us</a>
    </div>
</body>
</html>
