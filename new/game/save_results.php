<?php
// Start session
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accounts";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if user has played before
$username = $_SESSION['username'];
$sql = "SELECT * FROM results WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    // User hasn't played before, insert new record
    $sql = "INSERT INTO results (username, wins, losses, draws) VALUES ('$username', 0, 0, 0)";
    mysqli_query($conn, $sql);
}

// Get the user's current stats
$sql = "SELECT * FROM results WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$wins = $row['wins'];
$losses = $row['losses'];
$draws = $row['draws'];

// Update the stats based on the game result
if (isset($_POST['result'])) {
    // Update the stats based on the game result
    if ($_POST['result'] == 'You win!') {
        $wins++;
    } else if ($_POST['result'] == 'Computer wins!') {
        $losses++;
    } else {
        $draws++;
    }

    // Update the database with the new stats
    $sql = "UPDATE results SET wins = $wins, losses = $losses, draws = $draws WHERE username = '$username'";
    mysqli_query($conn, $sql);
}
?>
            
