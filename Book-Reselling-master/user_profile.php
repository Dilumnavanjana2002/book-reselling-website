<?php
include 'config.php';
session_start();

/* Protect page */
if (!isset($_SESSION['user_id'])) {
   header('location:login.php');
   exit;
}

$user_id = $_SESSION['user_id'];

/* Fetch user data */
$stmt = $conn->prepare("SELECT name, email, user_type FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
   $user = $result->fetch_assoc();
} else {
   $user = [
      'name' => 'Not Available',
      'email' => 'Not Available',
      'user_type' => 'user'
   ];
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>User Profile</title>

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- Main CSS -->
   <link rel="stylesheet" href="css/style.css">

   <!-- Inline CSS (only for profile) -->
   <style>
      .user-details .user-box {
         max-width: 600px;
         margin: 40px auto;
         background: #fff;
         border-radius: 8px;
         padding: 25px;
         box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      }

      .user-details table {
         width: 100%;
         border-collapse: collapse;
      }

      .user-details th {
         text-align: left;
         padding: 12px;
         width: 35%;
         background: #f4f4f4;
         font-weight: 600;
      }

      .user-details td {
         padding: 12px;
         color: #555;
      }

      .user-details tr:not(:last-child) {
         border-bottom: 1px solid #ddd;
      }

      .profile-actions {
         text-align: center;
         margin-top: 25px;
      }

      .profile-actions .btn {
         display: inline-block;
         padding: 10px 18px;
         margin: 5px;
         border-radius: 5px;
         color: #fff;
         text-decoration: none;
      }

      .btn-update {
         background: #3498db;
      }

      .btn-logout {
         background: #e74c3c;
      }
   </style>
</head>

<body>

   <?php include 'header.php'; ?>

   <section class="user-details">
      <div class="user-box">

         <table>
            <tr>
               <th><i class="fas fa-user"></i> Name</th>
               <td><?= htmlspecialchars($user['name']); ?></td>
            </tr>

            <tr>
               <th><i class="fas fa-envelope"></i> Email</th>
               <td><?= htmlspecialchars($user['email']); ?></td>
            </tr>

            <tr>
               <th><i class="fas fa-user-tag"></i> User Type</th>
               <td><?= htmlspecialchars($user['user_type']); ?></td>
            </tr>
         </table>

         <!-- ACTION BUTTONS -->
         <div class="profile-actions">
            <a href="update_profile.php" class="btn btn-update">
               <i class="fas fa-edit"></i> Update Profile
            </a>

            <a href="logout.php" class="btn btn-logout" onclick="return confirm('Are you sure you want to logout?');">
               <i class="fas fa-sign-out-alt"></i> Logout
            </a>
         </div>

      </div>
   </section>

   <?php include 'footer.php'; ?>

   <script src="js/script.js"></script>
</body>

</html>