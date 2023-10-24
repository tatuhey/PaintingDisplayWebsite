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

                    <form action="database/db_upload_artists.php" method="post" enctype="multipart/form-data">
                        <h1 class="mb-4">Upload New Artist</h1>

                        <div class="form-group">
                            <label for="artistName"><h4>Artist Name:</h4></label>
                            <input type="text" class="form-control" name="artistName" required>
                        </div>

                        <div class="form-group">
                            <label for="lifespan"><h4>Lifespan:</h4></label>
                            <input type="text" class="form-control" name="lifespan" required>
                        </div>

                        <div class="form-group">
                            <label for="nationality"><h4>Nationality:</h4></label>
                            <input type="text" class="form-control" name="nationality" required>
                        </div>

                        <div class="form-group">
                            <label for="period"><h4>Period:</h4></label>
                            <input type="text" class="form-control" name="period" required>
                        </div>

                        <div class="form-group">
                            <label for="image"><h4>Image:</h4></label>
                            <input type="file" class="form-control-file" name="image" accept="image/*" required>
                        </div>
                        <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="artists.php" class="btn btn-primary">Back</a> 
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

</body>
</html>
