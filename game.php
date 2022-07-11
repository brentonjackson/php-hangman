<?php
	session_start(); /* Starts the session */

	if(!isset($_SESSION['Username'])){
		header("location:login.php");
		exit;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="index.css">
	<?php include("gameLogic.php");?>
	<?php include("common.php");?>
	<!-- Make sure important cookies have been set
	such as the word being guessed, guesses made,
	and number of failed guesses.
	Each cookie lasts 24hr -->
	<?php loadCookies();?>	
	<title>
		Hangman
	</title>
</head>
<body class="game-body">
	<div class="nav-bar">
		<a href="./index.php">Home</a>
		<a href="./leaderboard.php">Leaderboards</a>
		<h1>HANGMAN</h1>
		<a class="nav-left" href="./login.php"><?php echo getUsername();?></a>
	</div>
	<div class='level-selector <?=isset($_COOKIE["difficulty"]) ? $_COOKIE["difficulty"] : "easy"?>'>
		<h3><?=strtoupper(isset($_COOKIE['difficulty']) ? $_COOKIE['difficulty'] : "easy")?></h3>
	</div>
	<div class="game-div">
		<!-- This shows the hangman image at its given stage -->
		<?php
		echo '<img src="images/hangman_stages/hangman_stage_' . $_COOKIE['imageIndex'] . '">';
		?>


		<!-- display the partially guessed word -->
		<h2 class="word"><?php echo displayWord();?></h2>

		<!-- form for guessing letters or whole words -->
		<form method="post">
	    <input type="text" name="guess" placeholder="make your guess!">
	    <input type="submit" name="guess_submit" value="guess" />
	  </form>


	  <!-- Show letters guessed already -->
	  <span class="word"><?php echo displayGuessedLetters()?></span>
  </div>
</body>
</html>