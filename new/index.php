
<!DOCTYPE html>
<html>
<head>
	<title>Rock Paper Scissors</title>
    <link rel="stylesheet" type="text/css" href="stlye.css">
</head>
<body>
	<h1>RPS V0.1</h1>
	
	<?php if(isset($_GET['action']) && $_GET['action'] == 'register'): ?>
		<h2>Register</h2>
		<?php include("account/register.html"); ?>
	<?php else: ?>
		<h2>Login</h2>
		<?php include("account/login.html"); ?>
		<p>Don't have an account? <a href="?action=register">Register here</a>.</p>
	<?php endif; ?>
</body>
</html>
