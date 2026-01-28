<?php
include 'config.php';
session_start();

if (isset($_POST['submit'])) {

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query(
      $conn,
      "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'"
   ) or die('query failed');

   if (mysqli_num_rows($select_users) > 0) {

      $row = mysqli_fetch_assoc($select_users);

      if ($row['user_type'] == 'admin') {

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');
         exit;

      } elseif ($row['user_type'] == 'user') {

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location:home.php');
         exit;

      } elseif ($row['user_type'] == 'cashier') {

         $_SESSION['cashier_name'] = $row['name'];
         $_SESSION['cashier_email'] = $row['email'];
         $_SESSION['cashier_id'] = $row['id'];
         header('location:admin_page.php');
         exit;

      }

   } else {
      $message[] = 'Incorrect email or password!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- INLINE CSS -->
   <style>
      * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         font-family: Arial, Helvetica, sans-serif;
      }

      body {
         min-height: 100vh;
         overflow: hidden;
      }

      /* Background Video */
      #bg-video {
         position: fixed;
         right: 0;
         bottom: 0;
         min-width: 100%;
         min-height: 100%;
         object-fit: cover;
         z-index: -2;
      }

      /* Dark overlay */
      body::before {
         content: "";
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background: rgba(0, 0, 0, 0.6);
         z-index: -1;
      }

      /* Message */
      .message {
         position: fixed;
         top: 20px;
         left: 50%;
         transform: translateX(-50%);
         background: #e74c3c;
         color: white;
         padding: 12px 20px;
         border-radius: 6px;
         display: flex;
         align-items: center;
         gap: 10px;
         z-index: 1000;
      }

      .message i {
         cursor: pointer;
      }

      /* Form container */
      .form-container {
         display: flex;
         align-items: center;
         justify-content: center;
         min-height: 100vh;
      }

      form {
         background: rgba(255, 255, 255, 0.15);
         backdrop-filter: blur(12px);
         padding: 30px;
         width: 350px;
         border-radius: 12px;
         text-align: center;
         color: #fff;
      }

      form h3 {
         margin-bottom: 20px;
         text-transform: uppercase;
      }

      .box {
         width: 100%;
         padding: 10px;
         margin: 10px 0;
         border-radius: 6px;
         border: none;
         outline: none;
      }

      .btn {
         width: 100%;
         padding: 10px;
         background: #00b894;
         border: none;
         border-radius: 6px;
         color: white;
         cursor: pointer;
         font-size: 16px;
      }

      .btn:hover {
         background: #019874;
      }

      p {
         margin-top: 15px;
      }

      a {
         color: #00cec9;
         text-decoration: none;
      }

      a:hover {
         text-decoration: underline;
      }
   </style>
</head>

<body>

   <!-- Background Video -->
   <video autoplay muted loop id="bg-video">
      <source src="videos/login_bk.mp4" type="video/mp4">
   </video>

   <?php
   if (isset($message)) {
      foreach ($message as $message) {
         echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
      }
   }
   ?>

   <div class="form-container">
      <form action="" method="post">
         <h3>Login Now</h3>
         <input type="email" name="email" placeholder="Enter your email" required class="box">
         <input type="password" name="password" placeholder="Enter your password" required class="box">
         <input type="submit" name="submit" value="Login Now" class="btn">
         <p>Don't have an account? <a href="register.php">Register now</a></p>
      </form>
   </div>

</body>

</html>