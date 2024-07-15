<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HN Shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel="stylesheet">
</head>
<body style="margin-bottom:200px">
    
    <?php
include '../libraries/header_menu.php';
include '../libraries/check-if-added.php';
?>
   
    <div id="">
        <div id="bg" class=" ">
            

            </div>
            </div>

        </div>
    </div>
    <div class="text-center pt-4 h3">
        <h2 style="font-family: 'Fjalla One'">FASHION LIFESTYLE</h2>
    </div>
    
 <div class="container pt-3">
    <h4 style="font-family: 'Fjalla One'">DANH MỤC NỔI BẬT</h4>
        <div class="row text-center ">
            <div class="col-6 col-md-3 py-3">
                <a href="products.php#watch"> 
                    <div class="h5 pt-3 font-weight-bolder">
                      Watches
                   </div>
                    <img src="images/dh1.webp" class="img-fluid " alt="" style="border-radius:0.5rem" width="210px">
                 </a>
             </div>
            <div class="col-6 col-md-3 py-3 " >
                <a href="products.php#shirt"  >
                    <div class="h5 pt-3 font-weight-bolder">
                        Clothing
                    </div>
                    <img src="images/ao 2.webp" class="img-fluid zoom" alt="" style="border-radius:0.5rem" width="210px" >
                  </a>
             </div>
            <div class="col-6 col-md-3 py-3">
                <a href="products.php#shoes">
                    <div class="h5 pt-3 font-weight-bolder">
                        Shoes
                     </div>
                 <img src="images/giay 1.webp" class="img-fluid   " alt="" style="border-radius:0.5rem; height:210px;width:210px" >
             </a>
             </div>
            <div class="col-6 col-md-3 py-3">
                <a href="products.php#paint">
                    <div class="h5 pt-3 font-weight-bolder">
                       Paint
                    </div>
                 <img src="images/quan 1.webp" class="img-fluid  " alt="" style="border-radius:0.5rem" width="210px" height="210px">
              </div>
            </a>
        </div>
    </div>

    
    <?php include '../libraries/footer.php'?>
    




</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
$(document).ready(function() {

if(window.location.href.indexOf('#login') != -1) {
  $('#login').modal('show');
}

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