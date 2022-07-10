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
    <div class="dropdown">
      <button class="drop-button">Play</button>
      <div class="dropdown-items">
        <a class="easy" href="game.php?difficulty=easy">Easy</a>
        <a class="medium" href="game.php?difficulty=medium">Medium</a>
        <a class="hard" href="game.php?difficulty=hard">Hard</a>
        <a class="expert" href="game.php?difficulty=expert">Expert</a>
      </div>
    </div>
    <a href="./leaderboard.php">Leaderboard</a>
    <h1>HANGMAN</h1>
    <a class="nav-left" href="./login.php"><?php echo getUsername();?></a>
  </div>

  <div class="content">
    <img src="./images/hangman.png" alt="picture of a hangman">
    <br><br>
    <h3>How to play:</h3>
    <p>The objective of this game is to guess a word one letter at a time. Too many wrong guesses and you lose. To play, hover over the play button at the top of this page and select a difficulty, then try guessing a letter. If you think you have the right word, just enter it into the guessing box. Good luck!</p>
    <br><br>
    <div class="footer"> © [Web Group Name] 2022</div>
  </div>

</body>
</html>
