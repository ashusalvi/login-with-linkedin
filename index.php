<?php
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);
    require_once "init.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign in with LinkedIn</title>
</head>
<body style="margin-top: 200px; text-align: center;">
    <img src="https://goo.gl/1H14Q6" alt="Logo" width="300">
    <h1><a style="font-family: 'Arial';" href="<?php  echo "https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id={$client_id}&redirect_uri={$redirect_uri}&state={$csrf_token}&scope={$scopes}"; ?>">Sign in with LinkedIn</a></h1>
    
</body>
</html>