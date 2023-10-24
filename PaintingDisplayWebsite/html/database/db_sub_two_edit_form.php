<?php

include('db_connect.php');

$userId = $_POST['userId'];

$sql = "SELECT * FROM users WHERE user_id=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $breakingNews = $_POST['options'];

    try {

        // Check if the breakingNews is being set to 0 (unsubscribed) or 1 (subscribed)
        if ($breakingNews == 0) {
            $sql = "UPDATE users SET breaking_news_subscription=?, breaking_news_unsubscribe_request=0 WHERE user_id=?";
        } else {
            $sql = "UPDATE users SET breaking_news_subscription=? WHERE user_id=?";
        }

        // Prepare and execute the query using prepared statements
        $stmt = $conn->prepare($sql);
        if ($stmt->execute([$breakingNews, $userId])) {
            header("Location: ../adminpage.php");
        }

    } catch (PDOException $e) {
        // Handle PDO exception
        echo "Error: " . $e->getMessage();
    }
}

?>
