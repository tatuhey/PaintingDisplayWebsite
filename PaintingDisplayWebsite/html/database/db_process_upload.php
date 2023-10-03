
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysql";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paintingTitle = $_POST["paintingTitle"];
    $finishedYear = $_POST["finishedYear"];
    $paintMedia = $_POST["paintMedia"];
    $artistName = $_POST["artistName"];
    $style = $_POST["style"];

    $sql = "INSERT INTO painting (paintingTitle, finishedYear, paintMedia, artistName, style) VALUES ('$paintingTitle', '$finishedYear', '$paintMedia', '$artistName', '$style')";

    if ($conn->query($sql) === TRUE) {
        echo "New entry added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
