<?php
include('db_connect.php');

if (isset($_POST['deleteEntry'])) {
    $paintingTitle = $_POST['paintingTitle'];

    try {
        // Create a DELETE query using prepared statements
        $sql = "DELETE FROM painting WHERE paintingTitle = :paintingTitle";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':paintingTitle', $paintingTitle, PDO::PARAM_STR);

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
