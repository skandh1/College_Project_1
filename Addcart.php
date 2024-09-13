<?php

    include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    
    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
    
       if(mysqli_num_rows($check_cart_numbers) > 0){
          $message[] = 'already added to cart!';
       }else{
          mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image1) VALUES('$user_id', '$product_name', '$product_price', 1, '$product_image')") or die('query failed');
          $message[] = 'product added to cart!';
       }
       header('Location:home.php');
?>