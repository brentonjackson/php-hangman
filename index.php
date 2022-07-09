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
<body class="game-body">
<?php navbar(); ?>
<div class="content game-div">
    <h1 class="game-title">Hangman</h1>
    <img src="./images/hangman.png" alt="">
    <div class="play-button-div">
      <a href="./game.php"><button class="play-button">Play Game</button></a>
    </div>
</div>

<?php footer(); ?>