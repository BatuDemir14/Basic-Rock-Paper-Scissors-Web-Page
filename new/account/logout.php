<?php
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();


// Redirect to login page
?>
<!DOCTYPE html>
<html>
<head>
    <title>Logged Out</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>:(</h1>
    <p>You have succesfully logged out of the system.</p>
    <p><a href="../index.php">Homepage</a></p>
</body>
</html>