<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="index.css">
	<?php include("gameLogic.php");?>
	<title>
		Hangman
	</title>
</head>
<body class="game-body">
	<div class="nav-bar">
		<div class="dropdown">
			<button class="drop-button">Difficulty</button>
			<div class="dropdown-items">
				<a class="easy" href="#">Easy</a>
				<a class="medium" href="#">Medium</a>
				<a class="hard" href="#">Hard</a>
				<a class="expert" href="#">Expert</a>
			</div>
		</div>
		<a href="leaderboard.php">Leaderboard</a>
		<h1>HANGMAN</h1>
		<a class="nav-left" href="login.php"><?php echo getUsername();?></a>
	</div>
	<div class='level-selector <?="easy"?>'>
		<h3>EASY</h3>
	</div>
	<div class="game-div">
		<!-- Make sure important cookies have been set
		such as the word being guessed, guesses made,
		and number of failed guesses.
		Each cookie lasts 24hr -->
		<!-- include relevant code -->
		<?php loadCookies();?>		

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
