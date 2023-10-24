<?php
include('db_connect.php');

if (isset($_POST['deleteEntry'])) {
    $artistName = $_POST['artistName'];

    try {
        // Create a DELETE query using prepared statements
        $sql = "DELETE FROM artists WHERE artistName = :artistName";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':artistName', $artistName, PDO::PARAM_STR);

        // Execute the query
        if ($stmt->execute()) {
            // Entry deleted successfully
            header("Location: ../artists.php"); // Redirect back to the paintings.php page
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
