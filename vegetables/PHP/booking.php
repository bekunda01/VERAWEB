<?php
include "db_connect.php";

// Get form data
$email = $_POST['email'];
$occupation = $_POST['occupation'];
$location = $_POST['location'];
$age = $_POST['age'];

$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

// Insert user into database
$sql = "INSERT INTO booking ( email,password,age, occupation, location) VALUES ('$email', '$password', '$age', '$occupation', '$location')";

if ($conn->query($sql) === TRUE) {
    // Close MySQL connection
    $conn->close();
    // Redirect to the home page
    header("Location: /zion_airlines/index.html");
    exit(); // Stop further execution
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    // Close MySQL connection
    $conn->close();
}


?>
