
<?php
// Database credentials
$servername = "localhost";
$username = "root"; // MySQL username
$password = "root123"; // MySQL password
$dbname = "your_database"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$location = $_POST['location'];
$email = $_POST['email'];
$contact_details = $_POST['contact_details'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO contact_form (name, phone, location, email, contact_details) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssssssss", $name, $phone, $location, $email, $contact_details);

// Execute the statement
if ($stmt->execute()) {
    echo "Data submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
