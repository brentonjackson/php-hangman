<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="index.css">
	<title>
		Hangman
	</title>
</head>
<body>
	<!-- Make sure important cookies have been set
	such as the word being guessed, guesses made,
	and number of failed guesses.
	Each cookie lasts 24hr -->
	<!-- include relevant code -->
	<?php include("gameLogic.php");?>
	<?php loadCookies();?>


	<h1>HANGMAN</h1>
	

	<!-- This shows the hangman image at its given stage -->
	<?php
	echo '<img src="images/hangman_stages/hangman_stage_' . $_COOKIE['imageIndex'] . '">';
	?>


	<!-- display a partially guessed word -->
	<?php if (isset($_GET['word'])) {?>
		<h2 class="word"><?php echo displayWord($_GET['word']);?></h2>
	<!-- or an entirely unguessed word -->
	<?php } else {?>
		<h2 class="word"><?php echo displayWord('-----');?></h2>
	<?php } ?>


	<!-- form for guessing letters or whole words -->
	<form method="post">
    <input type="text" name="guess" placeholder="make your guess!">
    <input type="submit" name="guess_submit" value="guess" />
  </form>
</body>
</html>