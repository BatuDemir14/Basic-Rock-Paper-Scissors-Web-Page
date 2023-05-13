<?php
   $host = "localhost"; // your database host name
   $dbname = "accounts"; // your database name
   $username = "root"; // your database username
   $password = ""; // your database password

   try {
      // create a new PDO connection to your database
      $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch(PDOException $e) {
      // if the connection fails, display an error message
      die("Connection failed: " . $e->getMessage());
   }
?>
