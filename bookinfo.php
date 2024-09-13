<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

$name = mysqli_real_escape_string($conn, $_POST['product_name']);
$sql = "SELECT * FROM `products` where name = '$name'";
$check_cart_numbers = mysqli_query($conn, $sql );

if (!$conn) {
    echo "Unable to connect to DB: " . mysqli_error();
    exit;
}
if (!$check_cart_numbers) {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
}
$fetch_products = mysqli_fetch_assoc($check_cart_numbers);
if($fetch_products == 0) {
    echo 'hell not working';
}
if ($fetch_products == 0) {
    echo "No rows found, nothing to print so am exiting";
    
    exit;
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
    
</head>
<body>
    <?php include 'header.php' ?>;
    
    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="images p-3">
                                <div class="text-center p-4"> <img class="img1" id="main-image" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($fetch_products['image1']); ?>" width="250" /> </div>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product p-4">
                                <div class="d-flex justify-content--09between align-items-center">
                                    
                                </div>
                                <div class="mt-4 mb-3">
                                    <h1 class="text-uppercase headingbook"><?php echo $name ?> </h1>
                                    <h6 class='author' >Author:- <?php echo $fetch_products['author']; ?> </h6>

                                    <div class="price d-flex flex-row align-items-center"> <h3 class="act-price">Price: Rs <?php echo $fetch_products['price']; ?></h3>
                                    
                                    </div>
                                </div>
                                <h6 class='desc' >Description</h3>
                                <p class="aboutbook" ><?php echo $fetch_products['description']; ?></p>
                                <form  method='post' action='Addcart.php'>
                                <div class="cart mt-4 align-items-center"> 
                                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo base64_encode($fetch_products['image1']); ?>">
                                    <button onclick="return confirm('product added to cart');" class="btn btn-danger text-uppercase mr-2 px-4" name='add_to_cart'> ADD TO CART </button></div>
                            </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>;
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
</body>
</html>