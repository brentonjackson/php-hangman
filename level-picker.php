<?php session_start(); /* Starts the session */
// if(!isset($_SESSION['UserData']['Username'])){
// 	header("location:login.php");
// 	exit;
// }
?>

<?php
  require('common.php');
  head();
?>
<?php navbar(); ?>
<div class="content">
    <h1 class="level-picker-title">Level Picker</h1>
    <div class="levels">
      <a href="game.php?difficulty=easy"><button class="level-button novice-button">Novice</button></a>
      <a href="game.php?difficulty=medium"><button class="level-button intermediate-button">Intermediate</button></a>
      <a href="game.php?difficulty=hard"><button class="level-button advanced-button">Advanced</button></a>
      <a href="game.php?difficulty=expert"><button class="level-button expert-button">Expert</button></a>
    </div>
</div>

<?php footer(); ?>