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
<body>
<?php navbar(); ?>
<div class="content">
    <div class="top-info">
        <div class="category">Category:</div>
        <div class="score">Score:</div>
    </div>
    <div class="game-area">
        <div class="game-pic"></div>
        <div class="game-words"></div>
    </div>
    <div class="game-input">
        <form action=""></form>
    </div>
    <div class="prev-guess-area">
        <span>Previous guesses:</span>
        <div class="prev-guesses"></div>
    </div>
</div>

<?php footer(); ?>