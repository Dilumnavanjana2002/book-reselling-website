<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

/* Fetch current values */
$stmt = $conn->prepare("SELECT name, email FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

/* Update profile */
if (isset($_POST['update'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    if (!empty($name) && !empty($email)) {

        $update = $conn->prepare(
            "UPDATE users SET name = ?, email = ? WHERE id = ?"
        );
        $update->bind_param("ssi", $name, $email, $user_id);

        if ($update->execute()) {
            $_SESSION['success_msg'] = "Profile updated successfully!";
        } else {
            $_SESSION['success_msg'] = "Update failed. Please try again.";
        }

        $update->close();
        header("Location: user_profile.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Profile</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php include 'header.php'; ?>

    <section class="form-container">
        <form action="" method="POST">
            <h3>Update Profile</h3>

            <input type="text" name="name" required value="<?= htmlspecialchars($user['name']); ?>"
                placeholder="Enter name" class="box">

            <input type="email" name="email" required value="<?= htmlspecialchars($user['email']); ?>"
                placeholder="Enter email" class="box">

            <button type="submit" name="update" class="btn">
                Update
            </button>
        </form>
    </section>

    <?php include 'footer.php'; ?>
</body>

</html>