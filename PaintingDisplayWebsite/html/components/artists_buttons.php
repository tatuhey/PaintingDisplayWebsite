<div class="container mt-5">
    <div class="row">
        <!-- Add button -->
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <div class="mb-4">
                <a href="upload_artist.php" class="btn btn-success btn-lg rounded-pill px-4 py-2">
                    <i class="fas fa-plus-circle mr-2"></i> Add New Entry
                </a>
            </div>
        </div>
        <!-- Filter buttons -->
        <div class="col-md-6">
            
        <?php
            include('../html/database/db_connect.php');

            // Query to fetch distinct artist names
            $nationalityQuery = "SELECT DISTINCT nationality FROM at2.artists";
            $nationalityStmt = $conn->prepare($nationalityQuery);
            $nationalityStmt->execute();
            $nationality = $nationalityStmt->fetchAll(PDO::FETCH_ASSOC);

            // Query to fetch distinct painting styles
            $periodsQuery = "SELECT DISTINCT period FROM at2.artists";
            $periodsStmt = $conn->prepare($periodsQuery);
            $periodsStmt->execute();
            $periods = $periodsStmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <style>
            
            .filter-form {
                background-color: #F2F2F2;
                border-radius: 5px;
                padding: 15px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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

        <form class="form-inline filter-form" action="artists.php" method="get">
            <div class="d-flex flex-column mb-3" id="filters">
                <div class="form-group mr-3">
                    <label for="filterNationality" class="mr-2">Filter by Nationality:</label>
                    <select class="custom-select" id="filterNationality" name="nationality" onchange="submitForm()">
                        <option value="">All Nationalities &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                        <?php
                        foreach ($nationality as $nationalityRow) {
                            $nationalities = $nationalityRow['nationality'];
                            echo "<option value=\"$nationalities\">$nationalities</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group mr-3">
                    <label for="filterPeriod" class="mr-2">Filter by Period:</label>
                    <select class="custom-select" id="filterPeriod" name="period" onchange="submitForm()">
                        <option value="">All Periods &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </option>
                        <?php
                        foreach ($periods as $periodRow) {
                            $period = $periodRow['period'];
                            echo "<option value=\"$period\">$period</option>";
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

        </div>
    </div>
</div>
