<?php session_start(); /* Starts the session */
// if(!isset($_SESSION['UserData']['Username'])){
// 	header("location:login.php");
// 	exit;
// }
?>

<?php
  require('common.php');
  head_unfinished();
?>
<link rel="stylesheet" href="./homepage.css"/>
</head>
<body id="homepage">
<?php navbar(); ?>
<div class="content">
    <h1 class="game-title">Hangman</h1>
    <div class="play-button-div">
        <button class="play-button">Play Game</button>
    </div>
</div>

<?php footer(); ?>