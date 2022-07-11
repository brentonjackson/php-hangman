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
    <a href="index.php">Home</a>
    <a href="./leaderboard.php">Leaderboard</a>
    <h1>HANGMAN</h1>
    <?php if (isset($_SESSION['Username'])) {?>
      <a class="nav-left" href="login.php"><?=$_SESSION["Username"]?><span> (Sign Out)</span></a>
    <?php } else {?>
      <a class="nav-left" href="login.php">Sign In</a>
    <?php } ?>
  </div>
  <div class="content">
	 <h1 class="game-over-state-text">you <?= $_GET['state']?>!</h1>
   <h2 class="game-over-state-text">The word was <?= $_COOKIE['word']?></h2>
  </div>
  <?php 
  setcookie("word", "", time() - 3600);
  unset($_COOKIE['word']);
  ?>
</body>
</html>