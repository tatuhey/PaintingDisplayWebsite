<?php
    include('db_connect.php');

    // Find the search term
    $paintingTitle = '%' . $_POST['paintingTitle'] . '%';

    // Select with search term using a prepared statement
    $sql = "SELECT * FROM painting WHERE paintingTitle LIKE :paintingTitle";
    $stmt = $conn->prepare($sql);

    // Bind the search term parameter and execute
    $stmt->bindParam(':paintingTitle', $paintingTitle, PDO::PARAM_STR);
    $stmt->execute();

    $rowCount = $stmt->rowCount();

    if ($rowCount == 1) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            include('../painting.php');
        }
    } else if ($rowCount > 1) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            include('../paintings.php');
        }
    }else {
        // Display "Painting Not Found" page
        include('../missing.php');
    }
?>
