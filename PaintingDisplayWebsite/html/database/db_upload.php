<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paintingTitle = $_POST["paintingTitle"];
    $finishedYear = $_POST["finishedYear"];
    $paintMedia = $_POST["paintMedia"];
    $artistName = $_POST["artistName"];
    $style = $_POST["style"];

    // Check if an image file was uploaded
    if (isset($_FILES['paintingImage'])) {
        $imageData = file_get_contents($_FILES['paintingImage']['tmp_name']);
        
        // Prepare the SQL statement with placeholders
        $sql = "INSERT INTO paintings (paintingTitle, finishedYear, media, artistName, style, image) VALUES (?, ?, ?, ?, ?, ?)";
        
        try {
            // Create a prepared statement
            $stmt = $conn->prepare($sql);
            
            // Bind parameters to the statement
            $stmt->bindParam(1, $paintingTitle, PDO::PARAM_STR);
            $stmt->bindParam(2, $finishedYear, PDO::PARAM_INT);
            $stmt->bindParam(3, $paintMedia, PDO::PARAM_STR);
            $stmt->bindParam(4, $artistName, PDO::PARAM_STR);
            $stmt->bindParam(5, $style, PDO::PARAM_STR);
            
            // Bind the image data as a binary large object (BLOB)
            $stmt->bindParam(6, $imageData, PDO::PARAM_LOB);
            
            // Execute the prepared statement
            if ($stmt->execute()) {
                header("Location: ../paintings.php");
                exit();
            } else {
                echo "Error: " . $stmt->errorInfo()[2];
            }
        } catch (PDOException $e) {
            // Handle PDO exception
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "No image file uploaded.";
    }
}

?>
