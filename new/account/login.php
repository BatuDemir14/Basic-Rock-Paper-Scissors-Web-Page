<?php

// Database configuration
$host = "localhost";
$user = "root";
$password = "";
$database = "accounts";

// Connect to the database
$connection = mysqli_connect($host, $user, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}    

// Get the username and password from the form
$username = mysqli_real_escape_string($connection, $_POST["username"]);
$password = mysqli_real_escape_string($connection, $_POST["password"]);
echo " your username : $username   your password : $password";
// Query the database for the user with the given username
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($connection, $query);

// Check if there is a user with the given username
if (mysqli_num_rows($result) ==1) {
    // Get the hashed password from the database
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['password'];
    
    
    // Verify the entered password with the hashed password
    if (password_verify($password,$hashed_password)) {
        // Login successful
        echo "Login successful!";
        session_start();
        $_SESSION['username'] = $username; // or $_SESSION['username'] = $username;

        header("Location:profile.php");
    } else {
        // Login failed
        echo "Invalid username or password.";
        echo" $password ,  $hashed_password" ;
    }

}
// Close the database connection
mysqli_close($connection);




?>

