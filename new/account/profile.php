<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('../images/background.jpg');
            background-size: cover;
        }
        .profile-container {
            margin-top: 50px;
            text-align: center;
            color: #fff;
        }
        .profile-buttons {
            margin-top: 30px;
            margin-bottom: 30px;
        }
        .box {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            margin-top: 50px;
        }
        .box p {
            color: #000;
        }
        body {
      color: black;
    }

    h1, h2, h3, h4, h5, h6 {
      color: black;
    }

    p, a {
      color: black;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-container">
            <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
            <p>This is your profile page.</p>
            <div class="profile-buttons">
              <a href="../game/rock-paper-scissors.php" class="btn btn-primary">Play Game</a>
              <a href="leaderboard.php" class="btn btn-primary">View Leaderboard</a>
              <a href="forum.php" class="btn btn-primary">Visit Forum</a>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="box">
                        <h2>About The Site</h2>
                        <p>Hi it's Batu welcome to my page this is an early devalopment so don't expect much out of it :) in this site you can play Rock Paper Scissors and also you can check the leaderboard to compare your results with other users and also you can leave notes to forum if you get any troubles about the site feel free to contact me enjoy !!! </p>
                        <p><strong>Contact Information:</strong></p>
                        <p><strong>Name:</strong> Random </p>
                        <p><strong>Email:</strong> random.companyai@gmail.com </p>
                       
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box">
                        <h2>Location</h2>
                        <iframe src=src=<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2727.0027916758263!2d19.643215075832504!3d46.88299363766619!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4743d0795a4cbfb7%3A0x1d6b1776878d61ae!2sHomokb%C3%A1nya%20Koll%C3%A9gium!5e0!3m2!1str!2shu!4v1683920955674!5m2!1str!2shu" width="600" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
