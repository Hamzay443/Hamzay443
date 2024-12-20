<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include './db.php'; // Include your database connection

    $brand = isset($_POST['brand']) ? $conn->real_escape_string($_POST['brand']) : '';
    $year = isset($_POST['year']) ? (int)$_POST['year'] : 0;
    $color = isset($_POST['color']) ? $conn->real_escape_string($_POST['color']) : '';

    var_dump($brand, $year, $color); // Debugging line

    if (!empty($brand) && !empty($year) && !empty($color)) {
        // Check if the year is valid (e.g., within a reasonable range)
        if ($year < 1886 || $year > date("Y")) { // 1886 is the year the first car was invented
            echo "<p>Error: Invalid year.</p>";
        } else {
            $sql = "INSERT INTO cars (brand, year, color) VALUES ('$brand', $year, '$color')";
            if ($conn->query($sql)) {
                echo "<p>Car added successfully.</p>";
            } else {
                echo "<p>Error: " . $conn->error . "</p>"; // Check for SQL errors
            }
        }
    } else {
        echo "<p>Please fill in all fields.</p>";
    }

    $conn->close();
}
?>