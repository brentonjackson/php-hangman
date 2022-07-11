<?php session_start(); /* Starts the session */
// if(!isset($_SESSION['UserData']['Username'])){
// 	header("location:login.php");
// 	exit;
// }
require('common.php');
head();
homepage_navbar();
?>

  <div class="content">
    <img src="./images/hangman.png" alt="picture of a hangman">
    <br><br>
    <h3>How to play:</h3>
    <p>The objective of this game is to guess a word one letter at a time. Too many wrong guesses and you lose. To play, just click the play button and select a difficulty, then try guessing a letter. If you think you have the right word, just enter it into the guessing box. Good luck!</p>
    <br>
    <a class="play-button" href="level-picker.php">play!</a>
    <br><br>
  </div>

<? footer(); ?>
