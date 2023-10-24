<?php
    include("db_connect.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $subStatusN = isset($_POST["newsletter"]) ? 1 : 0; // Default to 0 if not set
        $subStatusB = isset($_POST["breakingNews"]) ? 1 : 0; // Default to 0 if not set
        $user = $_POST["userId"];
        $subStatus = isset($_POST["newsletterStatus"]) ? "unsubscribed" : "subscribed";
        $sql = "UPDATE users SET newsletter_unsubscribe_request=?, breaking_news_unsubscribe_request=?, newsletter_status=? WHERE user_id=?";

        $stmt = $conn->prepare($sql);
        if($stmt->execute([$subStatusN, $subStatusB, $subStatus, $user])) {
            echo "Preference Updated";
        } else {
            echo "Error";
        }

    }


?>