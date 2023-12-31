<?php
include('db_connect.php');

if (isset($_POST['deleteEntry'])) {
    $paintingID = $_POST['paintingID'];

    try {
        // Create a DELETE query using prepared statements
        $sql = "DELETE FROM paintings WHERE paintingID = :paintingID";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':paintingID', $paintingID, PDO::PARAM_STR);

        // Execute the query
        if ($stmt->execute()) {
            // Entry deleted successfully
            header("Location: ../paintings.php"); // Redirect back to the paintings.php page
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
