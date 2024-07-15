<?php
include "bootstrap.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HN Shop | Online Shopping Site for Men</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!--header -->

 <?php
include '../libraries/header_menu.php';
include '../libraries/check-if-added.php';

?>
<!--header ends -->
<div class="container" style="margin-top:65px">
         <!--jumbutron start-->
        <div class="jumbotron text-center">
            <h1>Welcome to HN Shop!</h1>
            <p>We have wide range of products for you.No need to hunt around,we have all in one place</p>
        </div>
        <!--jumbutron ends-->
        <!--breadcrumb start-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </nav>
        <!--breadcrumb end-->
    <hr/>
    <!--menu list-->
    <div class="row text-center" id="watch">
    <?php
            $stmt = $PDO->prepare('SELECT * FROM products WHERE Type = :type');
            $type = 'dh';
            $stmt->bindParam(':type', $type);
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($products as $product) {
                ?>
                <div class="col-md-3 col-6 py-2">
            <div class="card">
                <img src="<?= $product['image_name'] ?>" class="img-fluid pb-1">
                <div class="figure-caption">
                    <h6><?= $product['name'] ?></h6>
                    <h6><?= $product['price'] ?>đ</h6>
                    <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Add To Cart</a></p>
                    <?php
                    } else {
                        if (check_if_added_to_cart($product['id'])) {
                        echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                        } else {
                        ?>
                        </p><a href="cart-add.php?id=<?= $product['id']?>" name="add" value="add" class="btn btn-warning  text-white">Add to cart</a></p>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
                <?php
            }
            ?>
    </div>
    <div class="row text-center" id="shirt">
            <?php
            $stmt = $PDO->prepare('SELECT * FROM products WHERE Type = :type');
            $type = 'ao';
            $stmt->bindParam(':type', $type);
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($products as $product) {
                ?>
                <div class="col-md-3 col-6 py-2">
            <div class="card">
                <img src="<?= $product['image_name'] ?>" class="img-fluid pb-1">
                <div class="figure-caption">
                    <h6><?= $product['name'] ?></h6>
                    <h6><?= $product['price'] ?>đ</h6>
                    <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Add To Cart</a></p>
                    <?php
                    } else {
                        if (check_if_added_to_cart($product['id'])) {
                        echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                        } else {
                        ?>
                        </p><a href="cart-add.php?id=<?= $product['id']?>" name="add" value="add" class="btn btn-warning  text-white">Add to cart</a></p>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
                <?php
            }
            ?>
            
    </div>
    <div class="row text-center" id="shoes" >
    <?php
            $stmt = $PDO->prepare('SELECT * FROM products WHERE Type = :type');
            $type = 'giay';
            $stmt->bindParam(':type', $type);
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($products as $product) {
                ?>
                <div class="col-md-3 col-6 py-2">
            <div class="card">
                <img src="<?= $product['image_name'] ?>" class="img-fluid pb-1">
                <div class="figure-caption">
                    <h6><?= $product['name'] ?></h6>
                    <h6><?= $product['price'] ?>đ</h6>
                    <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Add To Cart</a></p>
                    <?php
                    } else {
                        if (check_if_added_to_cart($product['id'])) {
                        echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                        } else {
                        ?>
                        </p><a href="cart-add.php?id=<?= $product['id']?>" name="add" value="add" class="btn btn-warning  text-white">Add to cart</a></p>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
                <?php
            }
            ?>      
    </div>
    <div class="row text-center" id="paint">
    <?php
            $stmt = $PDO->prepare('SELECT * FROM products WHERE Type = :type');
            $type = 'quan';
            $stmt->bindParam(':type', $type);
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($products as $product) {
                ?>
                <div class="col-md-3 col-6 py-2">
            <div class="card">
                <img src="<?= $product['image_name'] ?>" class="img-fluid pb-1">
                <div class="figure-caption">
                    <h6><?= $product['name'] ?></h6>
                    <h6><?= $product['price'] ?>đ</h6>
                    <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Add To Cart</a></p>
                    <?php
                    } else {
                        if (check_if_added_to_cart($product['id'])) {
                        echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                        } else {
                        ?>
                        </p><a href="cart-add.php?id=<?= $product['id']?>" name="add" value="add" class="btn btn-warning  text-white">Add to cart</a></p>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
                <?php
            }
            ?>             
    </div>
    
    
</body>
<footer>
<div style="position: absolute;
    margin-top: 50px;
    background-color: #141414;
    min-height:150px;
    padding-top:40px;
    width: 73vw;
   
    bottom: 0;" class="container text-center"><span class="text-muted"><b>Copyright&copy;HN Shop | All Rights Reserved | Contact Us: +91 90000 00000</b></span></div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
</script>
<?php if (isset($_GET['error'])) {$z = $_GET['error'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#signup').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>
<?php if (isset($_GET['errorl'])) {$z = $_GET['errorl'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#login').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>
</html>