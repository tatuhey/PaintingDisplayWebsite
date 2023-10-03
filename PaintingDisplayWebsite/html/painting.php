<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Painting Details</title>
    <link rel="stylesheet" />
</head>
<body>
    <!-- Navbar -->
    <?php include('components/navbar.php'); ?>

    <!-- Painting Details -->
    <div class="container my-4">
        <div class="row">
            <div class="col-md-6">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['paintingImage']); ?>" alt="Painting" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2 class="mb-4"><?php echo $row['paintingTitle']; ?></h2>
                <ul class="list-unstyled">
                    <li><strong>Artist Name:</strong> <?php echo $row['artistName']; ?></li>
                    <li><strong>Style:</strong> <?php echo $row['style']; ?></li>
                    <li><strong>Finished Year:</strong> <?php echo $row['finishedYear']; ?></li>
                    <li><strong>Paint Media:</strong> <?php echo $row['paintMedia']; ?></li>
                </ul>
                <a href="../paintings.php" class="btn btn-primary">Back</a> 
            </div>
        </div>
    </div>

</body>
</html>



