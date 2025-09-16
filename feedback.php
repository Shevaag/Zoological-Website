<?php

// Database configuration
$servername = "localhost";  
$username = "root";         
$password = "";             
$dbname = "zoopark";        

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) { //Checks if there was an error connecting to the database.
    die("Connection failed: " . $conn->connect_error); //If there is an error, the script stops execution and displays an error message.
}

// Retrieves form data submitted via POST request. These variables are extracted from the feedback form's input fields.
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$message = $_POST['message'];

$stmt = $conn->prepare("INSERT INTO feedback (name, email, mobile, message) VALUES (?, ?, ?, ?)"); //This helps prevent SQL injection attacks by separating SQL code from data.
$stmt->bind_param("ssis", $name, $email, $mobile, $message); //ssis=>Data types

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
