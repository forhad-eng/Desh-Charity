<?php
    $status = $_GET['status'];
    
    // if($status == 'fp'){
    //     $input = 300;
    // }elseif($status == 'sp'){
    //     $input == 500;
    // }elseif($status == 'tp'){
    //     $input == 800;
    // }elseif($status == 'fop'){
    //     $input == 1500;
    // }
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Exclusive Package</title>
        <!-- Meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords"
            content="Allied Login Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
        <script>
            addEventListener("load", function () { setTimeout(hideURLbar, 0); }, false); function hideURLbar() { window.scrollTo(0, 1); }
        </script>
        <!-- Meta tags -->
        <!-- font-awesome icons -->
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">
        <!-- //font-awesome icons -->
        <!--stylesheets-->
        <link href="assets/css/package-style.css" rel='stylesheet' type='text/css' media="all">
        <!--//style sheet end here-->
        <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- font-awesome -->
        <script src="https://kit.fontawesome.com/e627d5dbde.js" crossorigin="anonymous"></script>
        <!-- Template CSS Style link -->
        <link rel="stylesheet" href="assets/css/style-starter.css">
        <link href="//fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
        <!-- Template CSS Style link -->

    </head>

    <body>
        <!-- header -->
        <header class="fixed-top">
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand h3 fw-bold" href="index.php"><i
                            class="fas fa-hand-holding-heart  fs-1 ps-lg-5" style="color: red"></i> Desh Charity</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 pe-5 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="products.php">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">About us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="volunteer.php">Be a Volunteer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.html">Log In</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
        </header>
        <!-- //header -->

        <section class="mt-5 mb-5 pt-5 pb-5">
            <div class="two-grids">
                <div class="mid-class">
                    <div class="txt-left-side rounded">
                        <h2> Package </h2>
                        <p><strong>Thanks to choose our exclusive packages</strong></p>
                        <form action="#" method="post">
                            <div class="container">
                                <label for="fname" style="color: white">Name:</label><br>
                                <input type="text" id="fname" name="fname" value=""><br>

                                <label for="lname" style="color: white">Email:</label><br>
                                <input type="email" id="lname" name="lname" value=""><br>

                                <label for="fname" style="color: white">Amount:</label><br>
                                <input type="text" id="famount" name="fname" class="fw-bold fs-5"
                                value="<?php if($status == 'fp'){
                                            echo 300;
                                        }elseif($status == 'sp'){
                                            echo 500;
                                        }elseif($status == 'tp'){
                                            echo 800;
                                        }elseif($status == 'fop'){
                                            echo 1500;
                                        }
                                        ?>" readonly><br>
                                <label for="lname" style="color: white">Send-out Number:</label><br>
                                <input type="text" id="lsend" name="lname" value="">

                            </div>

                            <div class="btnn">
                                <button type="submit" style="color: white">Confirm</button>
                            </div>
                        </form>
                    </div>

                    <div class="img-right-side">
                        <h3>Welcome To Our Exculsive Packages</h3>
                        <p><strong>You can complete your payment method to send money in Bkash & Nagad </strong></p>
                        <h4><strong>Bkash Number:</strong> +8801778402398</h4>
                        <h4><strong>Nagad Number:</strong> +8801610230408</h4>
                        <img src="assets/images/bkash.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>

<?php
include_once 'footer.php';