<?php
    // Include the database connection script
    include('db_connect.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize and validate user input
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $newsletterSubscription = isset($_POST["newsletter"]) ? 1 : 0;
        $breakingNewsSubscription = isset($_POST["breakingNews"]) ? 1 : 0;

        // Check if email is valid
        if (!$email) {
            echo "Invalid email address.";
            exit;
        }

        // Prepare and execute the SQL query using PDO prepared statements
        $sql = "INSERT INTO users (username, email, password, newsletter_subscription, breaking_news_subscription) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt->execute([$username, $email, $password, $newsletterSubscription, $breakingNewsSubscription])) {
            // Registration successful
            echo "Registration successful!";
        } else {
            // Registration failed
            echo "Registration failed.";
        }
    }
?>
