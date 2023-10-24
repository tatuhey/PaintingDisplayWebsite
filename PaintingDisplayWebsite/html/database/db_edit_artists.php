<?php
include('db_connect.php');

$artistName = ""; 

// get painting details
if (isset($_GET['artistName'])) {
    $artistName = $_GET['artistName'];

    try {
        // Query to fetch painting details based on paintingID
        $sql = "SELECT * FROM artists WHERE artistName = :artistName";

        // Prepare and execute the query using prepared statements
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':artistName', $artistName, PDO::PARAM_INT);
        $stmt->execute();

        // Get the result as an associative array
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $artistName = $row["artistName"];
        $lifespan = $row['lifespan'];
        $nationality = $row['nationality'];
        $image = $row['image'];

    } catch (PDOException $e) {
        // Handle PDO exception
        echo "Error: " . $e->getMessage();
    }
}


// Handle form submission for updating painting details
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateEntry"])) {
    $newName = $_POST["artistName"];
    $lifespan = $_POST["lifespan"];
    $nationality = $_POST["nationality"];
    $oldName = $artistName;
var_dump($artistName);

    try {
        // Update query
        $updateSql = "UPDATE artists SET artistName=:newName, lifespan=:lifespan, nationality=:nationality WHERE artistName=:oldName";

        // Prepare the update query
        $updateStmt = $conn->prepare($updateSql);
        
        // Bind the values using named placeholders
        $updateStmt->bindParam(':newName', $newName, PDO::PARAM_STR);
        $updateStmt->bindParam(':lifespan', $lifespan, PDO::PARAM_STR);
        $updateStmt->bindParam(':nationality', $nationality, PDO::PARAM_STR);
        $updateStmt->bindParam(':oldName', $oldName, PDO::PARAM_STR);


        if ($updateStmt->execute()) {
            header("Location: ../html/artists.php");
        } else {
            echo "Error updating painting details: " . $updateStmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        // Handle PDO exception
        echo "Error: " . $e->getMessage();
    } catch (Exception $e) {
        // Handle other exceptions
        echo "Error: " . $e->getMessage();
    }
}

$conn = null; // Close the database connection
?>


