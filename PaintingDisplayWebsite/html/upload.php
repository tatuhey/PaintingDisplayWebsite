<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Upload</title>
</head>
<body>

    <?php include('components/navbar.php'); ?>

    <section id="tabs" class="project-tab">
        <div class="container">
            <div class="row">
                <div class="mb-3 mt-3 col-md-12">

                    <form action="database/db_upload.php" method="post" enctype="multipart/form-data">
                        <h1 class="mb-4">Upload New Painting</h1>

                        <div class="form-group">
                            <label for="paintingTitle"><h4>Painting Title:</h4></label>
                            <input type="text" class="form-control" name="paintingTitle" required>
                        </div>

                        <div class="form-group">
                            <label for="finishedYear"><h4>Finished Year:</h4></label>
                            <input type="text" class="form-control" name="finishedYear" required>
                        </div>

                        <div class="form-group">
                            <label for="paintMedia"><h4>Paint Media:</h4></label>
                            <input type="text" class="form-control" name="paintMedia" required>
                        </div>

                        <div class="form-group">
                            <label for="artistName"><h4>Artist Name:</h4></label>
                            <input type="text" class="form-control" name="artistName" required>
                        </div>

                        <div class="form-group">
                            <label for="style"><h4>Style:</h4></label>
                            <input type="text" class="form-control" name="style" required>
                        </div>

                        <div class="form-group">
                            <label for="image"><h4>Image:</h4></label>
                            <input type="file" class="form-control-file" name="paintingImage" accept="image/*" required>
                        </div>
                        <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="paintings.php" class="btn btn-primary">Back</a> 
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

</body>
</html>
