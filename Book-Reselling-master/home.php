<?php

// Include the configuration file
include 'config.php';

// Start a session to manage user sessions
session_start();

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Redirect to login page if the user is not logged in
if (!isset($user_id)) {
   header('location:login.php');
}

// Check if the form to add a product to the cart is submitted
if (isset($_POST['add_to_cart'])) {

   // Get product details from the form
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   // Check if the product is already in the cart for the specific user
   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   // If the product is already in the cart, display a message
   if (mysqli_num_rows($check_cart_numbers) > 0) {
      $message[] = 'already added to cart!';
   } else {
      // If the product is not in the cart, insert it into the cart table
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- Font Awesome CDN link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <?php include 'header.php'; ?>

   <section class="home">

      <div class="content">
         <h3>Hand Picked Book to your door.</h3>
         <p>"Welcome to Read Again, your literary haven where the pages come to life.
            Dive into a world of captivating stories, knowledge, and imagination as you browse through our extensive
            collection of books.
            Whether you're a seasoned reader or just starting your reading journey, we have something for everyone.
            Happy reading!</p>
         <a href="about.php" class="white-btn">discover more</a>
      </div>

   </section>

   <section class="products">

      <h1 class="title">latest products</h1>

      <div class="box-container">

         <?php
         // Retrieve and display the latest 6 products
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if (mysqli_num_rows($select_products) > 0) {
            while ($fetch_products = mysqli_fetch_assoc($select_products)) {
               ?>
               <form action="" method="post" class="box">
                  <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                  <div class="name"><?php echo $fetch_products['name']; ?></div>
                  <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
                  <input type="number" min="1" name="product_quantity" value="1" class="qty">
                  <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                  <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                  <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                  <input type="submit" value="add to cart" name="add_to_cart" class="btn">
               </form>
               <?php
            }
         } else {
            echo '<p class="empty">no products added yet!</p>';
         }
         ?>
      </div>

      <div class="load-more" style="margin-top: 2rem; text-align:center">
         <a href="shop.php" class="option-btn">load more</a>
      </div>

   </section>

   <section class="about">

      <div class="flex">

         <div class="image">
            <img src="images/about-us.jpg" alt="">
         </div>

         <div class="content">
            <h3>about us</h3>
            <p>Join our vibrant community of book enthusiasts! Connect with fellow readers, share your thoughts on the
               latest releases, and discover hidden literary gems together.
               Read Again is more than a bookstore; it's a haven for bibliophiles.</p>
            <a href="about.php" class="btn">read more</a>
         </div>

      </div>

   </section>

   <section class="home-contact">

      <div class="content">
         <h3>have any questions?</h3>
         <p>Drop us a message now if you have a problem</p>
         <a href="contact.php" class="white-btn">contact us</a>
      </div>

   </section>

   <?php include 'footer.php'; ?>

   <!-- Custom JS file link  -->
   <script src="js/script.js"></script>

</body>

</html>