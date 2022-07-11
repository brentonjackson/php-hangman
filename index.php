<?php session_start(); /* Starts the session */
// if(!isset($_SESSION['UserData']['Username'])){
// 	header("location:login.php");
// 	exit;
// }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Hangman</title>
  <?php require('common.php');?>
  <link rel="icon" type="image/x-icon" href="./images/favicon/favicon.ico">
  <link href="./index.css" rel="stylesheet"/>
</head>
<body class="game-body">
  <div class="nav-bar">
    <a href="./leaderboard.php">Leaderboard</a>
    <h1>HANGMAN</h1>
    <?php if (isset($_SESSION['Username'])) {?>
      <a class="nav-left" href="login.php"><?=$_SESSION["Username"]?><span> (Sign Out)</span></a>
    <?php } else {?>
      <a class="nav-left" href="login.php">Sign In</a>
    <?php } ?>
  </div>

  <div class="content">
    <img src="./images/hangman.png" alt="picture of a hangman">
    <br><br>
    <h3>How to play:</h3>
    <p>The objective of this game is to guess a word one letter at a time. Too many wrong guesses and you lose. To play, just click the play button and select a difficulty, then try guessing a letter. If you think you have the right word, just enter it into the guessing box. Good luck!</p>
    <br>
    <a class="play-button" href="level-picker.php">play!</a>
    <br><br>
    <div class="footer"> © [Web Group Name] 2022</div>
  </div>

</body>
</html>
