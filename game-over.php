<?php session_start();
  require('common.php');
  require('gameLogic.php');
  head();
  navbar();
?>
  <div class="content">
	 <h1 class="game-over-state-text">you <?= $_GET['state']?>!</h1>
   <h2 class="game-over-state-text">The word was <?= $_COOKIE['word']?></h2>
   <br><br>
   <a class="play-button" href="level-picker.php">play again!</a>
  </div>
  <?php 
  setcookie("word", "", time() - 3600);
  unset($_COOKIE['word']);
  footer();
  ?>
