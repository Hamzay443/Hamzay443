<?php


// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $car = htmlspecialchars(trim($_POST['car']));
    $bid = htmlspecialchars(trim($_POST['bid']));

    // Define starting bids for each car
    $startingBids = [
        "2020 BMW M3" => 40000,
        "2019 Audi A6" => 35000,
        "2019 Lexus ES" => 75000
    ];

    // Validate input
    if (empty($name) || empty($email) || empty($car) || empty($bid)) {
        echo "All fields are required.";
        exit;
    }

    

    if (!is_numeric($bid) || $bid <= 0) {
        echo "Bid must be a positive number.";
        exit;
    }

    // Check if the car exists in the starting bids
    if (!array_key_exists($car, $startingBids)) {
        echo "Car not found.";
        exit;
    }

    // Check if the bid is lower than the starting bid
    if ($bid < $startingBids[$car]) {
        echo "<div style='max-width: 600px; margin: auto; padding: 20px; background-color:#000a1f; border-radius: 10px; color: white;'>
        <p>Your bid of $$bid is lower than the starting bid of $".$startingBids[$car]." for the $car.</p>;
        </div>"
        exit;
    }

    
    $currentHighestBid = 85000; 

    if ($bid > $currentHighestBid) {
        // Display the highest bidder card
        echo "<div style='max-width: 600px; margin: auto; padding: 20px; background-color:#000a1f; border-radius: 10px; color: white;'>
                <h3>Congratulations, $name!</h3>
                <p>You are the highest bidder with a bid of $$bid for the $car!</p>
              </div>";
    } else {
        echo "<div style='max-width: 600px; margin: auto; padding: 20px; background-color:#000a1f; border-radius: 10px; color: white;'>
            <p>Your bid of $$bid is not the highest. The current highest bid is $$currentHighestBid.</p>;
            </div>"
    }
} else {
    echo "<div style='max-width: 600px; margin: auto; padding: 20px; background-color:#000a1f; border-radius: 10px; color: white;'>
    <p>Invalid request method.</p>;
    </div>"
}   
?>
