<?php
// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Connect to MySQL database
$mysqli = new mysqli("localhost", "username", "password", "database_name");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Insert data into MySQL database
$sql = "INSERT INTO contact_form (name, email, message) VALUES ('$name', '$email', '$message')";

if ($mysqli->query($sql) === TRUE) {
    // Send email
    $to = "your_email@example.com";
    $subject = "New Contact Form Submission";
    $email_message = "Name: $name\nEmail: $email\nMessage: $message";
    mail($to, $subject, $email_message);

    echo "Form submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

// Close MySQL connection
$mysqli->close();
?>
