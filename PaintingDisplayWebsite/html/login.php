<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
    <?php
        include("components/navbar.php");
    ?>
 
<div class="container d-flex justify-content-center align-items-center">
<form action="database/db_login.php" method="post" class="col-md-6">
            <h1 class="mb-4">Login</h1>
            <div class="form-group">
                <label for="userName">Username</label>
                <input class="form-control" type="text" name="username" id="username" placeholder="Enter username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Enter password" required>
            </div>

            <br>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Log In</button>
        </form>
</div>
</body>
</html>