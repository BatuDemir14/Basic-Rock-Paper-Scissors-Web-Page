<?php
// Connect to database
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'accounts';
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Validate input
    $errors = [];
    if (strlen($username) < 3) {
        $errors[] = "Username must be at least 3 characters";
    }
    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // If there are errors, display them to the user
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
        exit;
    }

    // Encrypt password using Bcrypt
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert data into database
    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashed_password, $email);
    if ($stmt->execute()) {
        echo "Registration successful";
        header("Location: ../index.php");
exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
