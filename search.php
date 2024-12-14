<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include './db.php'; // Include your database connection


// Get the search parameters from the request
$brand = isset($_GET['brand']) ? $_GET['brand'] : '';
$year = isset($_GET['year']) ? $_GET['year'] : '';
$color = isset($_GET['color']) ? $_GET['color'] : '';

// Prepare the SQL query
$sql = "SELECT * FROM cars WHERE 1=1"; // Start with a base query

// Add conditions based on user input
if (!empty($brand)) {
    $sql .= " AND brand LIKE '%" . $conn->real_escape_string($brand) . "%'";
}
if (!empty($year)) {
    $sql .= " AND year = " . (int)$year; // Cast to int for safety
}
if (!empty($color)) {
    $sql .= " AND color LIKE '%" . $conn->real_escape_string($color) . "%'";
}

// Execute the query
$result = $conn->query($sql);

// Prepare an array to hold the results
$cars = array();
if ($result) {
    if ($result->num_rows > 0) {
        // Fetch all matching records
        while ($row = $result->fetch_assoc()) {
            $cars[] = $row;
        }
    }
} else {
    // If the query fails, output the error
    echo json_encode(array("error" => $conn->error));
}

// Return the results as JSON
header('Content-Type: application/json');
echo json_encode($cars);

// Close the database connection
$conn->close();
?> 

