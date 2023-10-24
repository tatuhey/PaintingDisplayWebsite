<?php
    // Include the database connection script
    include('db_connect.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve user input from the form
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $password = $_POST["password"];

        // Query to check if the user exists
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);


        // Check if the user exists and the password is correct
        if ($user && password_verify($password, $user['password'])) {
            if ($user["username"] == "admin" && password_verify($password, $user['password'])) {
                header("Location: ../adminpage.php");
            } else {
                session_start();
                $_SESSION['user_id'] = $user['user_id']; // You might want to store the user's ID in the session
                header("Location: ../userpage.php"); // Redirect to a welcome page or dashboard
                exit;
            }
            // User is authenticated, you can set session variables or redirect to a success page

        } else {
            // Invalid credentials
            echo "Invalid username or password.";
        }
    }
?>
