<?php session_start(); /* Starts the session */
// if(!isset($_SESSION['UserData']['Username'])){
// 	header("location:login.php");
// 	exit;
// }
require('common.php');
head();
navbar();
?>

  <div class="content">
    <img src="./images/hangman.png" alt="picture of a hangman">
    <br><br>
    <h3>How to play:</h3>
    <p>The objective of this game is to guess a word one letter at a time. Too many wrong guesses and you lose. To play, hover over the play button at the top of this page and select a difficulty, then try guessing a letter. If you think you have the right word, just enter it into the guessing box. Good luck!</p>
    <br><br>
    <button><a href="./level-picker.php">Play</a></button>
  </div>

<? footer(); ?>
