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
    <form action="game.php" method="get" name="Levels_Form">
        <input class="level-button" type="submit" name="novice-button" value="Novice">
        <input class="level-button" type="submit" name="intermediate-button" value="Intermediate">
        <input class="level-button" type="submit" name="advanced-button" value="Advanced">
        <input class="level-button" type="submit" name="expert-button" value="Expert">
    </form>
    </div>
</div>

<?php footer(); ?>