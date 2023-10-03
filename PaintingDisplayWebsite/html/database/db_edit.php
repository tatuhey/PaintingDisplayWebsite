<?php
include('db_connect.php');

// Initialize variables for storing painting details
$paintingID = "";
$paintingTitle = "";
$finishedYear = "";
$paintMedia = "";
$artistName = "";
$style = "";

// get painting details
if (isset($_GET['paintingID'])) {
    $paintingID = $_GET['paintingID'];

    try {
        // Query to fetch painting details based on paintingID
        $sql = "SELECT * FROM painting WHERE paintingID = :paintingID";

        // Prepare and execute the query using prepared statements
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':paintingID', $paintingID, PDO::PARAM_INT);
        $stmt->execute();

        // Get the result as an associative array
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $paintingID = $row["paintingID"];
        $paintingTitle = $row["paintingTitle"];
        $finishedYear = $row["finishedYear"];
        $paintMedia = $row["paintMedia"];
        $artistName = $row["artistName"];
        $style = $row["style"];

    } catch (PDOException $e) {
        // Handle PDO exception
        echo "Error: " . $e->getMessage();
    }
}


// Handle form submission for updating painting details
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateEntry"])) {
    $paintingTitle = $_POST["paintingTitle"];
    $finishedYear = $_POST["finishedYear"];
    $paintMedia = $_POST["paintMedia"];
    $artistName = $_POST["artistName"];
    $style = $_POST["style"];
    $paintingID = $_POST["paintingID"];

    try {
        // Update query
        $updateSql = "UPDATE painting SET paintingTitle=?, finishedYear=?, paintMedia=?, artistName=?, style=? WHERE paintingID=?";
            
        // Prepare and execute the update query using prepared statements
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bindParam(1, $paintingTitle, PDO::PARAM_STR);
        $updateStmt->bindParam(2, $finishedYear, PDO::PARAM_STR);
        $updateStmt->bindParam(3, $paintMedia, PDO::PARAM_STR);
        $updateStmt->bindParam(4, $artistName, PDO::PARAM_STR);
        $updateStmt->bindParam(5, $style, PDO::PARAM_STR);
        $updateStmt->bindParam(6, $paintingID, PDO::PARAM_INT);


        if ($updateStmt->execute()) {
            include('paintings.php');
        } else {
            echo "Error updating painting details: " . $updateStmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        // Handle PDO exception
        echo "Error: " . $e->getMessage();
    }
}

$conn = null; // Close the database connection
?>


