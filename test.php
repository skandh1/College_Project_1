<?php

include 'config.php';

session_start();

$name = 'QW';
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

if($fetch_products   == 0) {
    echo 'hell not working';
}
if (mysqli_num_rows($check_cart_numbers) == 0) {
    echo "No rows found, nothing to print so am exiting";
    echo print_r(mysqli_fetch_row($check_cart_numbers));
    exit;
}

 echo print_r($fetch_products);

echo $fetch_products['author'];





?>