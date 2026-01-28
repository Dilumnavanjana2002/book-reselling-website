<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <?php include 'header.php'; ?>

   <div class="heading">
      <h3>about us</h3>
      <p> <a href="home.php">home</a> / about </p>
   </div>

   <section class="about">

      <div class="flex">

         <div class="image">
            <img src="images/about.jpg" alt="">
         </div>

         <div class="content">
            <h3>We are Trusted People</h3>
            <p>Join our vibrant community of book enthusiasts! Connect with fellow readers, share your thoughts on the
               latest releases, and discover hidden literary gems together.
               Little Read is more than a bookstore; it's a haven for bibliophiles.</p>
            <a href="contact.php" class="btn">contact us</a>
         </div>

      </div>

   </section>

   <section class="reviews">

      <h1 class="title">client's reviews</h1>

      <div class="box-container">

         <div class="box">
            <img src="images/client-view-4.jpg" alt="">
            <p>One of the standout features for me is the seamless integration with online bookstores. With just a few
               clicks, I can add new purchases to my library and keep my collection up-to-date effortlessly.</p>

            <h3>Andrew Newil</h3>
         </div>

         <div class="box">
            <img src="images/client-view-3.jpg" alt="">
            <p>Overall, Little Read has become an indispensable tool for any book lover. It's a must-have for those who
               want to take their reading habits to the next level. Kudos to the team for creating such a fantastic
               platform!</p>

            <h3>Herbi Lansbor</h3>
         </div>

         <div class="box">
            <img src="images/client-view-2.jpg" alt="">
            <p>One of the standout features for me is the seamless integration with online bookstores. With just a few
               clicks, I can add new purchases to my library and keep my collection up-to-date effortlessly.</p>

            <h3>Henry Devid</h3>
         </div>

         <div class="box">
            <img src="images/client-view-6.jpg" alt="">
            <p>One of the standout features for me is the seamless integration with online bookstores. With just a few
               clicks, I can add new purchases to my library and keep my collection up-to-date effortlessly.</p>

            <h3>Lily Olivia</h3>
         </div>

      </div>

   </section>

   <section class="authors">

      <h1 class="title">greate authors</h1>

      <div class="box-container">

         <div class="box">
            <img src="images/author-1.jpg" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3> Arthur Gorge</h3>
         </div>

         <div class="box">
            <img src="images/author-2.jpg" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>Amelia Dyas</h3>
         </div>

         <div class="box">
            <img src="images/author-3.jpg" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>Liyo Oscar</h3>
         </div>

         <div class="box">
            <img src="images/author-4.jpg" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>Demelza Blondie</h3>
         </div>

         <div class="box">
            <img src="images/author-5.jpg" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>Edison Gladwin</h3>
         </div>

         <div class="box">
            <img src="images/author-6.jpg" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>Annabeth Maple</h3>
         </div>

      </div>

   </section>







   <?php include 'footer.php'; ?>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>