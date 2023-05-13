<?php
session_start(); // Start session to manage user login status

// Check if user is logged in
if(!isset($_SESSION['username'])) {
    header("Location: ../index.php"); // Redirect to login page if not logged in
    exit();
}

// Check if form has been submitted
if(isset($_POST['submit'])) {
    // Get form data
    $username = $_SESSION['username'];
    $text = $_POST['post'];
    $date = date('Y-m-d H:i:s'); // Get current date and time

    // Insert post into database
    $conn = new mysqli("localhost", "root", "", "accounts");
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO forum (username, text, date) VALUES ('$username', '$text', '$date')";
    if($conn->query($sql) === false) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    // Redirect back to forum page after post is submitted
    header("Location: forum.php");
    exit();
}

// Retrieve previous posts from database
$conn = new mysqli("localhost", "root", "", "accounts");
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM forum ORDER BY date DESC";
$result = $conn->query($sql);

$posts = array();
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $posts[] = array(
            "username" => $row["username"],
            "text" => $row["text"],
            "date" => $row["date"]
        );
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forum</title>
    <link rel="stylesheet" type="text/css" href="../style/forumstyle.css">
</head>
<body>
    <div class="container">
        <div class="posts">
            <h1>Forum</h1>
            <h2>Recent Posts:</h2>
            <table>
                <tr>
                    <th>Username</th>
                    <th>Post</th>
                    <th>Date</th>
                </tr>
                <?php foreach($posts as $post): ?>
                <tr>
                    <td><?php echo $post["username"]; ?></td>
                    <td><?php echo $post["text"]; ?></td>
                    <td><?php echo $post["date"]; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="form">
            <form method="POST">
                <label for="post">New Post:</label>
                <textarea name="post" id="post" required></textarea>
                <input type="submit" name="submit" value="Submit">
            </form>
            <a href="profile.php">Go to MyProfile</a>
        </div>
    </div>
</body>
</html>
