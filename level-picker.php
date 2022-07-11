<?php session_start();
  require('common.php');
  head();
  navbar();
?>

<div class="content">
<h1 class="level-picker-title">Level Picker</h1>
<div class="levels">
  <a href="game.php?difficulty=easy"><button class="level-button novice-button">Easy</button></a>
  <a href="game.php?difficulty=medium"><button class="level-button intermediate-button">Medium</button></a>
  <a href="game.php?difficulty=hard"><button class="level-button advanced-button">Hard</button></a>
  <a href="game.php?difficulty=expert"><button class="level-button expert-button">Expert</button></a>
</div>
<?php footer(); ?>