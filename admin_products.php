<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['add_product'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $price = $_POST['price'];
     $desc = mysqli_real_escape_string($conn, ($_POST['desc']));
   $author = mysqli_real_escape_string($conn, ($_POST['author']));
// $desc = $_POST['desc'];
// $author = $_POST['author'];
   $cat = $_POST['category'];
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $fileinfo = @getimagesize($_FILES["image"]["tmp_name"]);
   $width = $fileinfo[0];
   $height = $fileinfo[1];
$getno = $height/$width;

// new editz-----------------------------------------------------------------------

   
   
   $image1 = addslashes(file_get_contents($image_tmp_name));














   $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');

   if(mysqli_num_rows($select_product_name) > 0){
      $message[] = 'product name already added';
   }else{   
         if($image_size > 200000){
            $message[] = 'image size is too large'.$image_size.'bytes';
         }else if (($width < "100" || $height < "100") && ($width > "3000" || $height > "3000")) {
            
            $message[] = "Image dimension should be between 100X100 - 3000x3000";
         }else if ($getno < 1.3 || $getno > 1.6) {
            
            $message[] = "height to width ration must be in between 1.3 - 1.6";
         }else{
            $add_product_query = mysqli_query($conn, "INSERT INTO products (name, author, description, categories, price, image1) VALUES('$name', '$author', '$desc',  '$cat', '$price', '$image1')") or die('query failed' );
            if($add_product_query){    
            $message[] = 'product added successfully!';}
            else{
               $message[] = 'product could not be added!';
            }
         }
      }
   }
   


if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_products.php');
}

if(isset($_POST['update_product'])){

   $update_p_id = $_POST['update_p_id'];
   $update_name = $_POST['update_name'];
   $update_price = $_POST['update_price'];
   $update_desc = $_POST['update_description'];
   $update_cat = $_POST['update_category'];
   $update_auth = $_POST['update_author'];

   mysqli_query($conn, "UPDATE `products` SET name = '$update_name', price = '$update_price', author = '$update_auth', description = '$update_desc', categories = '$update_cat' WHERE id = '$update_p_id'") or die('query failed');

   $update_image = $_FILES['update_image']['name'];
   
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $image1 = addslashes(file_get_contents($update_image_tmp_name));
   $update_image_size = $_FILES['update_image']['size'];
   // $update_folder = 'uploaded_img/'.$update_image;
   // $update_old_image = $_POST['update_old_image'];

   if(!empty($update_image)){
      if($update_image_size > 20000000){
         $message[] = 'image file size is too large';
      }else{
         mysqli_query($conn, "UPDATE `products` SET image1 = '$image1' WHERE id = '$update_p_id'") or die('query failed');
      //    move_uploaded_file($update_image_tmp_name, $update_folder);
        // unlink('uploaded_img/'.$update_old_image);
      }
   }

   header('location:admin_products.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<!-- product CRUD section starts  -->

<section class="add-products">

   <h1 class="title">shop products</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <h3>add product</h3>
      <input type="text" name="name" class="box" placeholder="enter product name" required>
      <input type="text" name="author" class="box" placeholder="enter author name" required>
      <input type="text" name="desc" class="box" placeholder="enter product Description" required>
      <input type="text" name="category" class="box" placeholder="enter product category" required>
      <input type="number" min="0" name="price" class="box" placeholder="enter product price" required>
      <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
      <input type="submit" value="add product" name="add_product" class="btn">
   </form>

</section>

<!-- product CRUD section ends -->

<!-- show products  -->

<section class="show-products">

   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <div class="box">
         <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($fetch_products['image1']); ?>" alt="">
         <div class="name"><?php echo $fetch_products['name']; ?></div>
         <div class="price">RS<?php echo $fetch_products['price']; ?>/-</div>
         <a href="admin_products.php?update=<?php echo $fetch_products['id']; ?>" class="option-btn">update</a>
         <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

</section>

<section class="edit-product-form">

   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
      <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
      <img src="uploaded_img/<?php echo $fetch_update['image']; ?>" alt="">
      <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="enter product name">
      <input type="number" name="update_price" value="<?php echo $fetch_update['price']; ?>" min="0" class="box" required placeholder="enter product price">
      <input type="text" name="update_author" value="<?php echo $fetch_update['author']; ?>" class="box" required placeholder="enter author name">
      <input type="text" name="update_description" value="<?php echo $fetch_update['description']; ?>" class="box" required placeholder="enter description name">
      <input type="text" name="update_category" value="<?php echo $fetch_update['categories']; ?>" class="box" required placeholder="enter category name">
      <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" value="update" name="update_product" class="btn">
      <input type="reset" value="cancel" id="close-update" class="option-btn">
   </form>
   <?php
         }
      }
      }else{
         echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
      }
   ?>

</section>







<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>