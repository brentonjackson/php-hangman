<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Game Over</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<?php include 'gameLogic.php';?>
</head>
<body>
	<h1 class="game-over-state-text">you <?= $_GET['state']?>!</h1>
	<?php updateUserScore()?>
	<?php resetGame()?>
	<a href="game.php">BACK</a>
</body>
</html>