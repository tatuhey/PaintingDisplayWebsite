<?php
include('db_connect.php');

$artistName = '%' . $_GET['artistName'] . '%';

$sql = "SELECT * FROM artists WHERE LOWER(artistName) LIKE LOWER(:artistName)";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':artistName', $artistName, PDO::PARAM_STR);
$stmt->execute();

$rowCount = $stmt->rowCount();

if ($rowCount > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        include('../artist.php');
    }
} else {
    include('../missing_artist.php');
}
?>
