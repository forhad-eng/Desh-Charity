<?php

session_start();

include_once 'assets/php/create-db.php';
include_once 'assets/php/component.php';

$db = new Dbh();
$db->connect();

if (isset($_POST['remove']))
{
    if (isset($_GET['action']) == 'remove')
    {
        foreach ($_SESSION['Cart'] as $key => $value)
        {
            if ($value['product_id'] == $_GET['id'])
            {
                unset($_SESSION['Cart'][$key]);
                echo "<script>alert('Product has been removed from the cart...')</script>";
                echo "<script>window.location = 'cart.php'</script>";

            }
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="./assets/css/cart.css">
</head>
<body class="bg-light">

<?php
    require_once ('assets/php/cart-header.php');
?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My Cart</h6>
                <hr>

                <div class="row g-2">
                    <?php
                    $total = 0;
                    $_SESSION['total_price'] = 0;
                    if (isset($_SESSION['Cart'])){
                        $product_id = array_column($_SESSION['Cart'],'product_id');

                        $result1 = $db->getDemoProduct('demoProduct');
                        $result2 = $db->getBabyCare('babycare');
                        $result3 = $db->getToys('toys');

                        while($row = mysqli_fetch_assoc($result1) OR $row = mysqli_fetch_assoc($result2) OR $row = mysqli_fetch_assoc($result3)){
                            foreach ($product_id as $id){
                                if ($row['id'] == $id){
                                    cartElement($row['product_image'],$row['product_name'],$row['product_price'],$row['id']);
                                    $total = $total + (int)$row['product_price'];
                                    $_SESSION['total_price'] = $total;
                                }
                            }
                        }

                        }else{
                            echo "<h5>Cart is Empty</h5>";
                        }

                    ?>

                </div>
            </div>
        </div>
        <div class="col-md-4 offset-md-1 mt-5">
            <div class="row d-flex flex-column gy-3">
            <div class="pt-4 pl-2 border rounded bg-white">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['Cart'])){
                                $count  = count($_SESSION['Cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>$<?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>$<?php
                            echo $total;
                            ?></h6>
                    </div>
                </div>
            </div>
                <div class="mt-2">
                    <a style="background: #32CD32;" class ="text-white text-decoration-none btn btn-lg btn-block mt-2"  href="./check-out.php">Proceed Checkout <i class="far fa-credit-card text-primary ps-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
