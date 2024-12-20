CREATE DATABASE UsersDB;

USE UsersDB ;

CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone_number VARCHAR(15) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO Users (email, phone_number) VALUES
('john.doe@example.com', '1234-5678'),
('jane.smith@example.com', '2345-6789'),
('alice.jones@example.com', '3456-7890'),
('bob.brown@example.com', '4567-8901'),
('charlie.white@example.com', '5678-9012'),
('david.green@example.com', '6789-0123'),
('eve.black@example.com', '7890-1234');

CREATE TABLE Feedback (
    feedback_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    satisfaction ENUM('very', 'somewhat', 'not') NOT NULL,
    feedback_text TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE
);

INSERT INTO Feedback (user_id, satisfaction, feedback_text) VALUES
(1, 'very', 'Great service, very satisfied!'),
(2, 'somewhat', 'Service was okay, but could be improved.'),
(3, 'not', 'I was not satisfied with the support I received.'),
(4, 'very', 'Excellent experience, will come back again!'),
(5, 'somewhat', 'The parts were good, but delivery was slow.'),
(6, 'very', 'Loved the auction experience, very smooth!'),
(7, 'not', 'Did not find the customer support helpful.');

CREATE TABLE Services (
    service_id INT AUTO_INCREMENT PRIMARY KEY,
    service_name VARCHAR(100) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO Services (service_name, description) VALUES
('Parts Purchase', 'Purchase various parts for your needs.'),
('Auction Participation', 'Join our auctions to bid on items.'),
('Customer Support', 'Get assistance with your purchases and inquiries.'),
('Feedback Submission', 'Provide feedback on our services.'),
('Calculator Tool', 'Use our calculator for estimates.'),
('Fun Page', 'Explore fun activities and games.'),
('About Us', 'Learn more about our company and mission.');


CREATE TABLE cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brand VARCHAR(50) NOT NULL,
    model VARCHAR(50) NOT NULL,
    year INT NOT NULL,
    color VARCHAR(30) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO cars (brand, model, year, color, price) VALUES
('Toyota', 'Camry', 2020, 'Blue', 24000.00),
('Ford', 'Mustang', 2021, 'Red', 35000.00),
('Honda', 'Civic', 2019, 'Black', 22000.00),
('Chevrolet', 'Malibu', 2022, 'White', 27000.00);
