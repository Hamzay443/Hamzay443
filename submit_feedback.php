<?php
include 'db.php'; // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['email'];
    $phone_number = $_POST['phoneNumber'];
    $satisfaction = $_POST['satisfaction'];
    $feedback_text = $_POST['feedback'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO Users (email, phone_number) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $phone_number);
    $stmt->execute();

    // Get the last inserted user ID
    $user_id = $stmt->insert_id;

    // Insert feedback
    $stmt = $conn->prepare("INSERT INTO Feedback (user_id, satisfaction, feedback_text) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $satisfaction, $feedback_text);
    $stmt->execute();

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Redirect or show success message
    echo "Thank you for your feedback!";
}
?>