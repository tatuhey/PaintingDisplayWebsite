<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Edit Artists</title>
</head>

<?php
    include('database/db_connect.php');

    // get painting details
    if (isset($_GET['artistId']) && isset($_GET["editEntry"])) {
        $artistId = $_GET['artistId'];

        try {
            // Query to fetch painting details based on paintingID
            $sql = "SELECT * FROM artists WHERE artistId = :artistId";

            // Prepare and execute the query using prepared statements
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':artistId', $artistId, PDO::PARAM_INT);
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
        $oldName = $_POST["oldName"];

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



<body>
<section id="tabs" class="project-tab">
        <div class="container">
            <div class="row">
                <div class="mb-3 mt-3 col-md-12">
                    <form action="../html/edit_artists.php" method="POST" enctype="multipart/form-data">
                        <h3 class="mb-4">Edit Painting</h3>

                        <div class="form-group">
                            
                            <input type="hidden" value="<?php echo $artistName; ?>" class="form-control" name="oldName" required >

                            <label for="artistName">Artist Name:</label>
                            <input type="text" value="<?php echo $artistName; ?>" class="form-control" name="artistName" required >

                            <label for="lifespan">Lifespan:</label>
                            <input type="text"  value="<?php echo $lifespan; ?>" class="form-control" name="lifespan" required>

                            <label for="nationality">Nationality:</label>
                            <input type="text" value="<?php echo $nationality; ?>" class="form-control" name="nationality" required>
                            
                            <br>
                            <input type="submit" value="Update" name="updateEntry" class="btn btn-success">


                            <a href="artists.php" class="btn btn-primary">Back</a> 
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</body>
</html>