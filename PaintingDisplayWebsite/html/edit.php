<?php
    include('database/db_edit.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Paintings</title>
</head>
<body>
<section id="tabs" class="project-tab">
        <div class="container">
            <div class="row">
                <div class="mb-3 mt-3 col-md-12">

                    <form action="db_edit.php" method="POST" enctype="multipart/form-data">
                        <h3 class="mb-4">Edit Painting</h3>

                        <div class="form-group">
                            
                            <label for="paintingTitle">Painting Title:</label>
                            <input type="text" value="<?php echo $paintingTitle; ?>" class="form-control" name="paintingTitle" required >

                            <label for="finishedYear">Finished Year:</label>
                            <input type="text" id="finishedYear" value="<?php echo $finishedYear; ?>" class="form-control" name="finishedYear" required>

                            <label for="paintMedia">Paint Media:</label>
                            <input type="text" id="paintMedia" value="<?php echo $paintMedia; ?>" class="form-control" name="paintMedia" required>

                            <label for="artistName">Artist Name:</label>
                            <input type="text" id="artistName" value="<?php echo $artistName; ?>" class="form-control" name="artistName" required>

                            <label for="style">Style:</label>
                            <input type="text" id="style" value="<?php echo $style; ?>" class="form-control" name="style" required>

                            <input type="hidden" id="paintingID" value="<?php echo $paintingID; ?>" class="form-control" name="paintingID">

                            <input type="submit" value="Update" name="updateEntry" class="btn btn-success">
                            <a href="paintings.php" class="btn btn-primary">Back</a> 
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</body>
</html>