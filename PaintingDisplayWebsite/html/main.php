<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">    
	<title>Homepage</title>
    

    <style>
        
        .colored-box {
            width: 100px;
            height: 100px;
            display: inline-block;
            margin: 10px;
        }
        .box-container {
            width: 300px; 
            height: 300px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-content: center;
            transform: rotate(45deg);
        }
        #box1 {
            background-color: #FF6B6B;
        }

        #box2 {
            background-color: #007BFF;
        }

        #box3 {
            background-color: #8AA39B;
        }
        #box4 {
            background-color: #FFD700; 
        }
        
    </style>
</head>

<body>
    
    <!-- Navbar -->
    <?php include('components/navbar.php'); ?>
    
    <main class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container main-content d-flex flex-row justify-content-between">
            <section aria-label="Main Content">
                <h1 class="display-4">ACME Art Gallery</h1>
                <p class="lead">A website to display paintings from all over the world</p>
                <dl>
                    <div class="row">
                        <div class="col-sm-4">
                            <dt>Mauriza Arianne</dt>
                        </div>
                        <div class="col-sm-5">
                            <dd>P252069</dd>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <dt>Raihan Khalil Abdillah</dt>
                        </div>
                        <div class="col-sm-5">
                            <dd>30065695</dd>
                        </div>
                    </div>
                </dl>
            </section>
            <aside class="col-md-4" aria-label="Company Logo">
                <div class="box-container">
                    <div class="colored-box" id="box1"></div>
                    <div class="colored-box" id="box2"></div>
                    <div class="colored-box" id="box3"></div>
                    <div class="colored-box" id="box4"></div>
                </div>
            </aside>
        </div>
    </main>


</body>
</html>
