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
    <?php include('components/paintings_buttons.php'); ?>

    <!-- if you cant see pictures remake the table from document-->

    <div class="vh-100 d-flex">
        <div class="container main-content">
            <div class="row">

                <?php

                    // display
                    include('components/table_structure.php');
                ?>

            </div>
        </div>
    </div>




</body>
</html>