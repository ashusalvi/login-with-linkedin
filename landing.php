<?php
require "init.php";
if (!isset($_SESSION['user'])) {
    header("location: index.php");
}

$user = $_SESSION['user'];
print_r($user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>
<body style="margin-top: 200px; text-align: center;">
    <div>
        <label style="font-weight: 600">First Name</label><br>
        <label><?php echo $user->firstName ?></label><br><br>

        <label style="font-weight: 600">Last Name</label><br>
        <label><?php echo $user->lastName ?></label><br><br>

        <label style="font-weight: 600">Email Address</label><br>
        <label><?php echo $user->emailAddress ?></label><br><br>

        <label style="font-weight: 600">Headline</label><br>
        <label><?php echo $user->headline ?></label><br><br>

        <label style="font-weight: 600">Industry</label><br>
        <label><?php echo $user->industry ?></label><br><br>

        <button><a href="logout.php">Log out</a></button>


    </div>    
</body>
</html>