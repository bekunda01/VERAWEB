<?php
    session_start();
    
    $con = new mysqli("localhost", "root", "login", "customer");
    if ($con->connect_error) {
        die("Failed to connect: " . $con->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!empty($email) && !empty($password) && !is_numeric($email)) {
            $query = "SELECT * FROM customer WHERE email = ? LIMIT 1";
            $state = $con->prepare($query);
            $state->bind_param("s", $email);
            $state->execute();
            $result = $state->get_result();
            if ($result->num_rows > 0) {
                $user_data = $result->fetch_assoc();
                if ($user_data['password'] == $password) {
                    echo "Your login was successful";
                    header("location: menu.html");
                    exit;
                } else {
                    echo "Try again";
                }
            } else {
                echo "Try again";
            }
        }
    }
?>
