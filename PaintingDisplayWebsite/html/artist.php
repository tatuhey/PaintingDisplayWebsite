<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
    <style>
        #content {
            background-color: #b5b5b5;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        .img-fluid {
            max-width: 100%;
            height: auto;
        }
        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
        }
        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
        h2 {
            font-size: 24px;
        }
        ul.list-unstyled li {
            margin-bottom: 10px;
        }
    </style>
    <title>Painting Details</title>
</head>
<body>
    <!-- Navbar -->
    <?php include('components/navbar.php'); ?>

    <?php include('database/db_query_artists.php');
    if (!empty($result) && isset($result[0])) {
        $results = $result[0]; 
    }
    ?>

    <div class=" my-4 vh-100 align-items-center d-flex">
        <div id="content" class="container d-flex justify-content-between">

            <div class="col-md-6">
                <h2 class="mb-4"><?php echo $results['artistName']; ?></h2>
                <ul class="list-unstyled">
                    <li><strong>Lifespan:</strong> <?php echo $results['lifespan']; ?></li>
                    <li><strong>Nationality:</strong> <?php echo $results['nationality']; ?></li>
                </ul>
                <a href="../html/artists.php" class="btn btn-primary">Back</a> 
            </div>


            <div class="col-md-6">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($results['image']); ?>" alt="Painting" class="img-fluid">
            </div>
        </div>
    </div>
</body>
</html>
