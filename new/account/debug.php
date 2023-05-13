<?php
// Debug code for register.php and login.php

// Debug code: print out the $_POST array
echo "<pre>";
print_r($_POST);
echo "</pre>";

// Debug code: print out the values of $username, $password, and $email
echo "Username: " . $username . "<br>";
echo "Password: " . $password . "<br>";
echo "Email: " . $email . "<br>";

// Debug code: print out the hashed password
echo "Hashed password: " . $hashed_password . "<br>";

// Debug code: print out the result of the query
if ($result) {
    echo "User registered successfully!";
} else {
    echo "Error: " . mysqli_error($connection);
}

// Debug code: print out the values of $username and $password
echo "Username: " . $username . "<br>";
echo "Password: " . $password . "<br>";

// Debug code: print out the hashed password retrieved from the database
echo "Hashed password retrieved from database: " . $hashed_password . "<br>";

// Debug code: verify the password and print the result
if (password_verify($password, $hashed_password)) {
    echo "Login successful!";
} else {
    echo "Invalid username or password.";
}
?>
