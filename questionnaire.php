<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and collect data
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $satisfaction = htmlspecialchars($_POST['satisfaction']);
    $services = implode(", ", $_POST['services']); // Assume multiple checkboxes
    $feedback = htmlspecialchars($_POST['feedback']);

    // Display the feedback (could also save it to a database)
    echo "Thank you for your feedback!<br>";
    echo "Email: $email<br>";
    echo "Phone: $phone<br>";
    echo "Satisfaction: $satisfaction<br>";
    echo "Services used: $services<br>";
    echo "Feedback: $feedback<br>";
}
?>
