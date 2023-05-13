<?php
// Start session
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Rock Paper Scissors Game</title>
	<style type="text/css">
		body {
			background-image: url('../images/background.jpg?v=1');
			background-repeat: repeat;
			font-family: Arial, sans-serif;
			font-size: 20px;
			text-align: center;
			margin: 30px;
		}
		h1 {
			font-size: 50px;
			margin-bottom: 20px;
		}
		button {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			cursor: pointer;
			margin: 5px;
			float: left;
		}
		img {
			width: 200px;
			height: 200px;
		}
		.button-group {
			clear: both;
		}
	</style>
	<script src="game.js"></script>
</head>
<body>
	<h1>Rock Paper Scissors Game</h1>
	<p>Choose your move:</p>
	<div class="button-group">
		<button id="rock"><img src="../images/rock.jpg" alt="Rock"></button>
		<button id="paper"><img src="../images/paper.jpg" alt="Paper"></button>
		<button id="scissors"><img src="../images/scissors.jpg" alt="Scissors"></button>
	</div>
	<p id="result"></p>
	<div class="form">
		<a href="../account/profile.php">Go to MyProfile</a>
	</div>
</body>
</html>
