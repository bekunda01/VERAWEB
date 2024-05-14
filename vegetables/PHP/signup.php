<?php
include "db_connect.php";

// Get form data
$email = $_POST['email'];


$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
$full_name = $_POST['full_name'];
                
// Insert user into database
$sql = "INSERT INTO signup ( email,password,  full_name) VALUES ('$email', '$password', '$full_name' )";

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

