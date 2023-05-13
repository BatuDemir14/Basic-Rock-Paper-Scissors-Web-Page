
<!DOCTYPE html>
<html>
<head>
	<title>Rock Paper Scissors</title>
    <link rel="stylesheet" type="text/css" href="stlye.css">
</head>
<body>
	<h1>RPS V0.1</h1>
	<h2>Welcome</h2>
	<?php if(isset($_GET['action']) && $_GET['action'] == 'register'): ?>
		<h2>Register</h2>
		<?php include("account/register.html"); ?>
	<?php else: ?>
		<h2>If You Have An Account Please Login</h2>
		<?php include("account/login.html"); ?>
		<p>Don't have an account? <a href="?action=register"><button>Register here</p>
	<?php endif; ?>
</body>
</html>
