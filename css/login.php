<?php
// Establish database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "authentication_example";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$action = $_POST['action'];
$username = $_POST['username'];
$password = $_POST['password'];

if ($action === "login") {
    // Check user credentials for login
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        echo "Login successful!";
    } else {
        echo "Login failed. Please check your credentials.";
    }
} elseif ($action === "signup") {
    // Insert new user into the database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Sign up successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
