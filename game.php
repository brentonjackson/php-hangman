<?php
  require('common.php');
  include("gameLogic.php");
  head();
?>
<body class="game-body">
	<?php game_navbar(); ?>
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
  </div>
</body>
</html>
