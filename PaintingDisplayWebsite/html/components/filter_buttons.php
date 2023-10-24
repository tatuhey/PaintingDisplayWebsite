<style>
    
    .filter-form {
        
        border-radius: 5px;
        padding: 15px;

        display: flex;
        flex-wrap: wrap;
        justify-content: center;

    }


    label {
        font-weight: bold;
        margin-right: 10px;
        color: #333;
    }

    .filters {
        display: flex;
        flex-direction: column;
        
    }

    select.custom-select {
        width: 100%;
        max-width: 200px; 
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #fff;
    }

    .btn-apply-filters {
        width: 100%;
        max-width: 200px; 
        padding: 10px;
        border: none;
        background-color: #007BFF; 
        color: #fff;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }


    .btn-apply-filters:hover {
        background-color: #0056b3; 
    }
    
</style>

<?php
    include('../html/database/db_connect.php');

    // Query to fetch distinct artist names
    $artistQuery = "SELECT DISTINCT artistName FROM artists";
    $artistStmt = $conn->prepare($artistQuery);
    $artistStmt->execute();
    $artists = $artistStmt->fetchAll(PDO::FETCH_ASSOC);

    // Query to fetch distinct painting styles
    $styleQuery = "SELECT DISTINCT style FROM paintings";
    $styleStmt = $conn->prepare($styleQuery);
    $styleStmt->execute();
    $styles = $styleStmt->fetchAll(PDO::FETCH_ASSOC);
?>


<form class="form-inline filter-form" action="paintings.php" method="get">
    <div class="d-flex flex-column mb-3" id="filters">
        <div class="form-group mr-3">
            <label for="filterArtist" class="mr-2">Filter by Artist:</label>
            <select class="custom-select" id="filterArtist" name="artist" onchange="submitForm()">
                <option value="">All Artists &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                <?php
                foreach ($artists as $artistRow) {
                    $artistName = $artistRow['artistName'];
                    echo "<option value=\"$artistName\">$artistName</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group mr-3">
            <label for="filterStyle" class="mr-2">Filter by Style:&nbsp;</label>
            <select class="custom-select" id="filterStyle" name="style" onchange="submitForm()">
                <option value="">All Styles &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </option>
                <?php
                foreach ($styles as $styleRow) {
                    $style = $styleRow['style'];
                    echo "<option value=\"$style\">$style</option>";
                }
                ?>
            </select>
        </div>
    </div>
</form>

<script>
    function submitForm() {
        document.querySelector(".filter-form").submit();
    }
</script>




