<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Paintings</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
    <!-- Navbar -->
    <?php include('components/navbar.php'); ?>
    <!-- Paintings Filter -->
    <div class="container mt-5">
        <div class="row">
            <!-- Add button -->
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="mb-4">
                    <a href="upload.php" class="btn btn-success btn-lg rounded-pill px-4 py-2">
                        <i class="fas fa-plus-circle mr-2"></i> Add New Entry
                    </a>
                </div>
            </div>
            <!-- Filter buttons -->
            <div class="col-md-6">
                
                <?php include('components/filter_buttons.php'); ?>
                
            </div>
        </div>
    </div>
    <div class="vh-100 d-flex justify-content-center">

        <div class="container main-content">
            <div class="">

            <?php include('database/db_query.php'); ?>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Painting Title</th>
                                    <th>Finished Year</th>
                                    <th>Media</th>
                                    <th>Artist</th>
                                    <th>Style</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result && $stmt->rowCount() > 0) {
                                    foreach ($result as $row) {
                                        include('components/table_content.php');
                                    }
                                } else {
                                    echo '<tr><td colspan="7">No results found.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            </div>
        </div>
    </div>




</body>
</html>