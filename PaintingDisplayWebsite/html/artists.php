<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Artists</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
    <!-- Navbar -->
    <?php include('components/navbar.php'); ?>

    <!-- Paintings Filter -->
    <?php include('components/artists_filter_buttons.php'); ?>

    <!-- if you cant see pictures remake the table from document-->

    <div class="d-flex">
        <div class="container main-content">
            <div class="">

            <?php include('database/db_query_artists.php'); ?>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                <th>Artist Name</th>
                                <th>Lifespan</th>
                                <th>Nationality</th>
                                <th>Thumbnail</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if ($result && $stmt->rowCount() > 0) {
                                foreach ($result as $row) {
                                    include('components/table_content_artists.php');
                                }
                            } else {
                                echo '<tr><td colspan="6">0 results</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            </div>
        </div>
    </div>




</body>
</html>