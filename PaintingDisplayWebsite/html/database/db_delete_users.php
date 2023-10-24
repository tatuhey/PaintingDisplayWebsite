<?php
include('db_connect.php');

if (isset($_POST['deleteEntry'])) {
    $userName = $_POST['username'];

    try {
        // Create a DELETE query using prepared statements
        $sql = "DELETE FROM users WHERE email = :userName";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userName', $userName, PDO::PARAM_STR);

        // Execute the query
        if ($stmt->execute()) {
            // Entry deleted successfully
            header("Location: ../adminpage.php"); 
            exit();
        } else {
            // Error occurred while deleting
            echo "Error: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        // Handle PDO exception
        echo "Error: " . $e->getMessage();
    }

    $stmt->closeCursor();
}

$conn = null; // Close the database connection
?>
