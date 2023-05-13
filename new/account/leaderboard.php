<!DOCTYPE html>
<html>
<head>
	<title>Leaderboard</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
	<style>
		body {
			background: url("../images/background.jpg") no-repeat center center fixed; 
  			background-size: cover;
		}
		.table {
			margin: auto;
			width: 80%;
			font-size: 20px;
			background-color: white;
			opacity: 0.9;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1 class="text-center my-5">Leaderboard</h1>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Rank</th>
					<th>Username</th>
					<th>Wins</th>
					<th>Losses</th>
					<th>Draws</th>
					<th>Win Rate</th>
					<th>Total Games</th>
				</tr>
			</thead>
			<tbody>
				<?php
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

					// Get the leaderboard data
					$sql = "SELECT username, wins, losses, draws FROM results ORDER BY wins DESC";
					$result = mysqli_query($conn, $sql);

					// Print out the leaderboard
					$rank = 1;
					while ($row = mysqli_fetch_assoc($result)) {
						$username = $row['username'];
						$wins = $row['wins'];
						$losses = $row['losses'];
						$draws = $row['draws'];
						$totalGames = $wins + $losses + $draws;
						$winRate = ($totalGames > 0) ? round(($wins / $totalGames) * 100, 2) . "%" : "-";

						echo "<tr>";
						echo "<td>" . $rank . "</td>";
						echo "<td>" . $username . "</td>";
						echo "<td>" . $wins . "</td>";
						echo "<td>" . $losses . "</td>";
						echo "<td>" . $draws . "</td>";
						echo "<td>" . $winRate . "</td>";
						echo "<td>" . $totalGames . "</td>";
						echo "</tr>";

						$rank++;
					}

					// Close the database connection
					mysqli_close($conn);
				?>
			</tbody>
		</table>
		<div class="d-grid gap-2 col-6 mx-auto my-5">
			<a href="profile.php" class="btn btn-primary btn-lg">Back to Profile</a>
		</div>
	</div>
	<script type="text/javascript" src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
</body>
</html>
