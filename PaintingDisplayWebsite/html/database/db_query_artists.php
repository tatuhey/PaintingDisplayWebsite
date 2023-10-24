<?php
    // connect
    include('db_connect.php');
    // Set query
    $sql = "SELECT * FROM artists";
    $params = array();

    if (isset($_GET['nationality']) || isset($_GET['period'])) {
        // Artist filter
        $selectedNationality = $_GET['nationality'];
        $selectedPeriod = $_GET['period'];
        if (!empty($selectedNationality)) {
            $sql .= " WHERE nationality = :nationality";
            $params['nationality'] = $selectedNationality;
        } elseif (!empty($selectedPeriod)) {
            $sql .= " WHERE period = :period";
            $params['period'] = $selectedPeriod;
        }
    } else if (isset($_GET['artistName'])) {
    	$selectedArtist = $_GET['artistName'];
    	if (!empty($selectedArtist)) {
        	$sql .= " WHERE artistName = :artistName";
        	$params['artistName'] = $selectedArtist;
        }
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Execute the prepared statement with parameters
    $stmt->execute($params);

    // Fetch results as an associative array
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
