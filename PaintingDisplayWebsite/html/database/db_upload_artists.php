<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $artistName = $_POST["artistName"];
    $lifespan = $_POST["lifespan"];
    $nationality = $_POST["nationality"];
    $period = $_POST["period"];

    // Check if an image file was uploaded
    if (isset($_FILES['paintingImage'])) {
        $imageData = file_get_contents($_FILES['paintingImage']['tmp_name']);
        
        // Prepare the SQL statement with placeholders
        $sql = "INSERT INTO artists (artistName, lifespan, nationality, period, paintingImage) VALUES (?, ?, ?, ?, ?)";
        
        try {
            // Create a prepared statement
            $stmt = $conn->prepare($sql);
            
            // Bind parameters to the statement
            $stmt->bindParam(1, $artistName, PDO::PARAM_STR);
            $stmt->bindParam(2, $lifespan, PDO::PARAM_STR);
            $stmt->bindParam(3, $nationality, PDO::PARAM_STR);
            $stmt->bindParam(4, $period, PDO::PARAM_STR);
            
            // Bind the image data as a binary large object (BLOB)
            $stmt->bindParam(5, $imageData, PDO::PARAM_LOB);
            
            // Execute the prepared statement
            if ($stmt->execute()) {
                header("Location: ../artists.php");
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
