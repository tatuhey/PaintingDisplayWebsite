<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paintingTitle = $_POST["paintingTitle"];
    $finishedYear = $_POST["finishedYear"];
    $paintMedia = $_POST["paintMedia"];
    $style = $_POST["style"];
    $artistId = $_POST["artistId"];

    // Check if an image file was uploaded
    if (isset($_FILES['paintingImage'])) {
        $imageData = file_get_contents($_FILES['paintingImage']['tmp_name']);
        
        // Prepare a SQL statement to fetch the artistName based on artistId
        $artistQuery = "SELECT artistName FROM artists WHERE artistId = ?";
        $artistStmt = $conn->prepare($artistQuery);
        $artistStmt->bindParam(1, $artistId, PDO::PARAM_INT);
        
        try {
            // Execute the artist query
            if ($artistStmt->execute()) {
                $row = $artistStmt->fetch(PDO::FETCH_ASSOC);
                if ($row) {
                    $artistName = $row['artistName'];
                    
                    // Prepare the SQL statement to insert the painting data
                    $sql = "INSERT INTO paintings (artistName, paintingTitle, finishedYear, media, style, artistId, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
                    
                    // Create a prepared statement
                    $stmt = $conn->prepare($sql);
                    
                    // Bind parameters to the statement
                    $stmt->bindParam(1, $artistName, PDO::PARAM_STR);
                    $stmt->bindParam(2, $paintingTitle, PDO::PARAM_STR);
                    $stmt->bindParam(3, $finishedYear, PDO::PARAM_INT);
                    $stmt->bindParam(4, $paintMedia, PDO::PARAM_STR);
                    $stmt->bindParam(5, $style, PDO::PARAM_STR);
                    $stmt->bindParam(6, $artistId, PDO::PARAM_INT);
                    
                    // Bind the image data as a binary large object (BLOB)
                    $stmt->bindParam(7, $imageData, PDO::PARAM_LOB);
                    
                    // Execute the prepared statement
                    if ($stmt->execute()) {
                        header("Location: ../paintings.php");
                        exit();
                    } else {
                        echo "Error: " . $stmt->errorInfo()[2];
                    }
                } else {
                    echo "Artist not found for the given artistId.";
                }
            } else {
                echo "Error fetching artist information: " . $artistStmt->errorInfo()[2];
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
