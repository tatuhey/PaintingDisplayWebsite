<?php
    // connect
    include('db_connect.php');
    // Set query
    $sql = "SELECT * FROM painting";
    $params = array();

    if (isset($_GET['artist']) || isset($_GET['style'])) {
        // Artist filter
        $selectedArtist = $_GET['artist'];
        $selectedStyle = $_GET['style'];
        if (!empty($selectedArtist)) {
            $sql .= " WHERE artistName = :artistName";
            $params['artistName'] = $selectedArtist;
        } elseif (!empty($selectedStyle)) {
            $sql .= " WHERE style = :style";
            $params['style'] = $selectedStyle;
        }
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Execute the prepared statement with parameters
    $stmt->execute($params);

    // Fetch results as an associative array
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
