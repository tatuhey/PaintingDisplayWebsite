<?php

include('db_connect.php');

$userId = $_POST['userId'];

$sql = "SELECT * FROM users WHERE user_id=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newsletter = $_POST['options'];

    try {

        // Check if the newsletter is being set to 0 (unsubscribed) or 1 (subscribed)
        if ($newsletter == 0) {
            $sql = "UPDATE users SET newsletter_subscription=?, newsletter_unsubscribe_request=0 WHERE user_id=?";
        } else {
            $sql = "UPDATE users SET newsletter_subscription=? WHERE user_id=?";
        }

        // Prepare and execute the query using prepared statements
        $stmt = $conn->prepare($sql);
        if ($stmt->execute([$newsletter, $userId])) {
            header("Location: ../adminpage.php");
        }

    } catch (PDOException $e) {
        // Handle PDO exception
        echo "Error: " . $e->getMessage();
    }
}

?>
