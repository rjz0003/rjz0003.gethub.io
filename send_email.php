<?php
// Database connection
$servername = "localhost";
$username = "MySQL83";
$password = "Trot7188!";
$dbname = "utf8mb4";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // Insert into database
    $sql = "INSERT INTO contact_info (name, email, message) VALUES ('$name', '$email', '$message')";
    
    if ($conn->query($sql) === TRUE) {
        // Send email
        $to = "rjz0003@mix.wvu.edu";
        $subject = "New Contact Form Submission";
        $body = "Name: $name\nEmail: $email\nMessage: $message";
        $headers = "From: $email";

        mail($to, $subject, $body, $headers);
        
        echo "Thank you for your message!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
