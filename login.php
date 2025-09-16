<?php
session_start();

//Username and Password
$admin_username = "Admin";
$admin_password = "Password123";

$username = $_POST['username']; //Retrieves the username submitted via a POST request from the login form.
$password = $_POST['password']; //Retrieves the password submitted via a POST request from the login form.

// Check if the entered credentials match
if ($username === $admin_username && $password === $admin_password) {
    $_SESSION['loggedin'] = true; //Sets a session variable loggedin to true, indicating that the user is authenticated.
    $_SESSION['username'] = $username; //Stores the username in a session variable username for later use.
    header("Location: event.php"); // Redirect to the events editing page
} else {
    echo "<script>alert('Incorrect username or password. Please try again.'); window.location.href='login.html';</script>"; //Displays an alert message indicating that the login attempt failed
}
?>
