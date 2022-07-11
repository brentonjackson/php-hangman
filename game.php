<?php
	session_start(); /* Starts the session */

	if(!isset($_SESSION['Username'])){
		header("location:login.php");
		exit;
	}
	require('common.php');
	include("gameLogic.php");
	head();
	navbar(); 
	// Make sure important cookies have been set
	// such as the word being guessed, guesses made,
	// and number of failed guesses.
	// Each cookie lasts 24hr
	loadCookies();
	if(isset($_POST['hint'])) {
		setcookie("hint", "no", time() + (3600 * 24));
		$_COOKIE["hint"] = "no";
		giveHint();
	}
 ?>
	<!-- Grab difficulty level from query parameters -->
	<div class='level-selector <?=isset($_GET['difficulty']) ? $_GET['difficulty'] : "easy"?>'>
		<h3><?=strtoupper(isset($_GET['difficulty']) ? $_GET['difficulty'] : "easy")?></h3>

	<div class="game-div">
		<!-- Make sure important cookies have been set such as the word being guessed, guesses made, and number of failed guesses. Each cookie lasts 24hr -->
		<?php loadCookies();?>			
		<!-- This shows the hangman image at its given stage -->
		<?php
			echo '<img src="./images/hangman_stages/hangman_stage_' . $_COOKIE['imageIndex'] . '.png">';		
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
	  <br><br>
	  <?php if($_COOKIE['hint'] == 'yes') {?>
		  <form method="post"><button type="submit" name="hint" value="hint">Hint</button></form>
		<?php } ?>
  </div>
<? footer(); ?>