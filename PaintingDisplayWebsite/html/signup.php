<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Sign Up</title>

    <style>
        /* Apply text-transform: capitalize; to input fields */
        input[type="text"] {
            text-transform: capitalize;
        }
    </style>
</head>
<body>
    <?php
        include('components/navbar.php');
    ?>

    <?php
        include('database/db_signup.php')
    ?>
    <div class="container vh-100 d-flex justify-content-center align-items-center flex-column">
        <form action="signup.php" method="post" class="col-md-6">
            <h1 class="mb-4">Sign Up</h1>
            <div class="form-group">
                <label for="userName">Username</label>
                <input class="form-control" type="text" name="username" id="username" placeholder="Enter username" required>
            </div>
            <script>
            document.getElementById("username").addEventListener("input", function (event) {

                var inputValue = event.target.value;

                var sanitizedValue = inputValue.replace(/[^A-Za-z\s]/g, '');

                event.target.value = sanitizedValue;
            });
            </script>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Enter Email" required>
            </div>

            <div class="form-group">
                <label for="Password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Enter Password" required>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="newsletter" id="newsletterCheckbox">
                <label class="form-check-label" for="newsletterCheckbox">
                    Subscribe to Monthly Newsletter
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="breakingNews" id="breakingNewsCheckbox">
                <label class="form-check-label" for="breakingNewsCheckbox">
                    Subscribe to Breaking News
                </label>
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign Up</button>
        </form>

        <p> - or - </p>
        <a href="login.php"><button class="btn btn-primary btn-lg btn-block">Login</button></a>
    </div>
</body>
</html>
